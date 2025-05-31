<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart as CartModel;
use App\Models\Cart_items;
use App\Models\Orders;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Payments;
use App\Models\Product;


class Checkout extends Component
{

    public $cartItems = [];
    public $total = 0;
    public $shipping_address = '';
    public $city = '';
    public $zip = '';
    public $payment_method = '';
    public $firstName = '';
    public $lastName = '';
    public $email = '';
    public $phone = '';
    public $showPaymentPopup = false;
    public $orderId;


    public function mount()
    {
        $this->loadCheckout();
    }

    public function loadCheckout()
    {
        $cart = CartModel::where('user_id', auth()->id())->first();
        if ($cart) {
            $this->cartItems = Cart_items::where('cart_id', $cart->_id)->get();
            $this->calculateTotal();
        }
    }
    public function calculateTotal()
    {
        $this->total = 0;
        foreach ($this->cartItems as $item) {
            $this->total += $item->price * $item->qty;
        }
    }
    public function placeOrder()
    {
        Log::info('Placing order with data: ', [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
            'phone' => $this->phone,
            'shipping_address' => $this->shipping_address,
            'city' => $this->city,
            'zip' => $this->zip,
            'payment_method' => $this->payment_method,
            'total' => $this->total,
        ]);
        $this->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'shipping_address' => 'required|string',
            'city' => 'required|string',
            'zip' => 'required|string',
            'payment_method' => 'required|string',
        ]);
        if (!$this->checkStockAvailability()) {
            return;
        }
        $order = Orders::create([
            'user_id' => auth()->id(),
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'phone' => $this->phone,
            'shipping_address' => $this->shipping_address,
            'city' => $this->city,
            'zip' => $this->zip,
            'payment_method' => $this->payment_method,
            'total_amount' => $this->total,
            'status' => 'pending',
            'items' => collect($this->cartItems)->map(function ($item) {
                return [
                    'product_id' => $item->product_id,
                    'qty' => $item->qty,
                    'price' => $item->price,
                ];
            })->toArray(),
        ]);

        if ($order) {
            $this->reduceStock();
            $this->clearCart();
            session()->flash('success', 'Order placed successfully!');
            if ($this->payment_method === 'cod') {
                return redirect()->route('otp')->with('order', $order->id);
            } elseif ($this->payment_method === 'card') {
                $this->orderId = $order->id;
                $this->showPaymentPopup = true;
                return;
            }
        }
        return;
        session()->flash('error', 'Failed to place the order. Please try again.');
    }

    public function clearCart()
    {
        $cart = CartModel::where('user_id', auth()->id())->first();
        if ($cart) {
            Cart_items::where('cart_id', $cart->_id)->delete();
            // $this->cartItems = [];
            // $this->total = 0;
        }
    }


    public function confirmPayment()
    {
        $order = Orders::where('_id', $this->orderId)->first();
        if ($order) {
            $order->status = 'paid';
            $order->save();
            Payments::create([
                'order_id' => $order->id,
                'payment_method' => $this->payment_method,
                'amount' => $this->total,
                'status' => 'paid',
            ]);
        }
        $this->showPaymentPopup = false;
        session()->flash('success', 'Payment confirmed successfully!');
        return redirect()->route('orders.confirm');
    }

    public function cancelPayment()
    {
        $order = Orders::where('_id', $this->orderId)->first();
        if ($order) {
            $order->status = 'failed';
            $order->save();

            Payments::create([
                'order_id' => $order->_id,
                'payment_method' => $this->payment_method,
                'amount' => $this->total,
                'status' => 'failed',
            ]);
        }

        $this->showPaymentPopup = false;
        session()->flash('error', 'Payment failed');
        return redirect()->route('orders.confirm');
    }

    public function reduceStock()
    {
        foreach ($this->cartItems as $item) {
            $product = Product::find($item->product_id);
            if ($product && $product->qty >= $item->qty) {
                $product->qty -= $item->qty;
                $product->save();
            }
        }
    }
    protected function checkStockAvailability()
    {
        foreach ($this->cartItems as $item) {
            $product = Product::find($item->product_id);

            if (!$product) {
                session()->flash('error', "Product not found: ID {$item->product_id}");
                return false;
            }

            if ($product->qty < $item->qty) {
                session()->flash('error', "Insufficient stock for product: {$product->product_name}.");
                return false;
            }
        }
        return true;
    }



    public function render()
    {
        return view('livewire.checkout', [
            'cartItems' => $this->cartItems,
            'total' => $this->total,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
            'phone' => $this->phone,
            'shipping_address' => $this->shipping_address,
            'city' => $this->city,
            'zip' => $this->zip,
            'payment_method' => $this->payment_method,
        ])->layout('layouts.livewire');
    }
}
