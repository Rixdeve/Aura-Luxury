<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Cart as CartModel;
use App\Models\Cart_items;
use Illuminate\Support\Facades\Storage;

class Cart extends Component
{
    public $cartItems = [];
    public $total = 0;
    public $tempUrl;
    public $product;


    public function mount()
    {
        $this->loadCart();
    }


    public function loadCart()
    {
        $cart = CartModel::where('user_id', auth()->id())->first();

        if ($cart) {
            $this->cartItems = Cart_items::where('cart_id', $cart->_id)->with('product')->get()->map(function ($item) {
                if ($item->product && $item->product->img_url) {
                    $item->tempUrl = Storage::disk('s3_gcs')->temporaryUrl($item->product->img_url, now()->addMinutes(30));
                } else {
                    $item->tempUrl = null;
                }
                return $item;
            });
            $this->calculateTotal();
        }
    }


    public function removeFromCart($cartItemId)
    {
        $cartItem = Cart_items::findor($cartItemId);
        if ($cartItem) {
            $cartItem->delete();
            $this->loadCart();
        }
    }

    public function calculateTotal()
    {
        $this->total = 0;
        foreach ($this->cartItems as $item) {
            $this->total += $item->price * $item->qty;
        }
    }

    public function increaseQuantity($cartItemId)
    {
        $item = Cart_items::find($cartItemId);
        if ($item) {
            $item->qty++;
            $item->save();
            $this->loadCart();
        }
    }

    public function decreaseQuantity($cartItemId)
    {
        $item = Cart_items::find($cartItemId);
        if ($item && $item->qty > 1) {
            $item->qty--;
            $item->save();
            $this->loadCart();
        }
    }


    public function render()
    {


        return view('livewire.cart', [
            'cartItems' => $this->cartItems,
            'total' => $this->total,
            'tempUrl' => $this->tempUrl,

        ])->layout('layouts.livewire');
    }
}
