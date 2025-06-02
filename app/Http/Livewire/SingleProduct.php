<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Cart as CartModel;
use App\Models\Cart_items;
use Illuminate\Support\Facades\Storage;


class SingleProduct extends Component
{
    public $product;
    public $tempUrl;
    public $quantity = 1;

    public function mount($id)
    {
        $this->product = Product::findOrFail($id);

        if ($this->product->img_url) {
            $this->tempUrl = Storage::disk('s3_gcs')->temporaryUrl($this->product->img_url, now()->addMinutes(30));
        }
    }

    public function addToCart($productId)
    {
        $cart = CartModel::firstOrCreate(['user_id' => auth()->id()]);
        $cartItems = Cart_items::where('cart_id', $cart->id)
            ->where('product_id', $productId)
            ->first();

        if ($cartItems) {
            $cartItems->qty += $this->quantity;;
            $cartItems->save();
        } else {
            Cart_items::create([
                'cart_id' => $cart->id,
                'product_id' => $productId,
                'qty' => $this->quantity,
                'price' => Product::find($productId)->price,
            ]);
        }
    }


    public function render()
    {
        return view('livewire.single-product', [
            'product' => $this->product,
            'tempUrl' => $this->tempUrl,
        ])->layout('layouts.livewire');
    }
}
