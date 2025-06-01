<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;

use Livewire\Component;
use App\Models\Product;
use App\Models\Cart as CartModel;
use App\Models\Cart_items;

class Shop extends Component
{
    public $category = "";
    public $price;
    public $availability;
    public $types;
    public $brand;
    public $quantity = 1;

    public function mount()
    {
        // $this->category = request()->query('category', '');
        // $this->price = request()->query('price', '');
        // $this->availability = request()->query('availability', '');
        // $this->types = request()->query('types', '');   
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
        $products = Product::query();
        $products->where('qty', '>', 0);


        if ($this->category) {
            $products->where('category', $this->category);
        }
        if ($this->category == "Watch") {
            $products->where('types', '!=', 'Perfume');
        } elseif ($this->category == "Perfume") {
            $products->where('types', '!=', 'Watch');
        }
        if ($this->category == "All") {
            $products->where('types', '!=', 'Watch');
            $products->where('types', '!=', 'Perfume');
        }

        if ($this->price && is_numeric($this->price)) {
            $products->whereRaw([
                'price' => ['$lte' => (float) $this->price]
            ]);
        }

        if ($this->availability) {
            $products->where('availability', $this->availability);
        }


        if ($this->types) {
            $products->where('types', $this->types);
        }
        if ($this->types == "Male") {
            $products->where('types', '!=', 'Female');
            $products->where('types', '!=', 'Unisex');
        } elseif ($this->types == "Female") {
            $products->where('types', '!=', 'Male');
            $products->where('types', '!=', 'Unisex');
        }
        if ($this->types == "Unisex") {
            $products->where('types', '!=', 'Male');
            $products->where('types', '!=', 'Female');
        }

        if ($this->brand) {
            $products->where('brand', $this->brand);
        }
        if ($this->brand == "ROLEX") {
            $products->where('brand', '!=', 'CHANNEL');
            $products->where('brand', '!=', 'HUBLOT');
            $products->where('brand', '!=', 'DUCATI');
            $products->where('brand', '!=', 'TAG HEUER');
            $products->where('brand', '!=', 'CITIZEN');
            $products->where('brand', '!=', 'SEIKO');
            $products->where('brand', '!=', 'DIOR');
            $products->where('brand', '!=', 'GUERLAIN');
            $products->where('brand', '!=', 'CREED');
            $products->where('brand', '!=', 'AMOUAGE');
        } elseif ($this->brand == "CHANNEL") {
            $products->where('brand', '!=', 'SEIKO');
            $products->where('brand', '!=', 'HUBLOT');
            $products->where('brand', '!=', 'DUCATI');
            $products->where('brand', '!=', 'TAG HEUER');
            $products->where('brand', '!=', 'CITIZEN');
            $products->where('brand', '!=', 'ROLEX');
            $products->where('brand', '!=', 'DIOR');
            $products->where('brand', '!=', 'GUERLAIN');
            $products->where('brand', '!=', 'CREED');
            $products->where('brand', '!=', 'AMOUAGE');
        }
        if ($this->brand == "HUBLOT") {
            $products->where('brand', '!=', 'CHANNEL');
            $products->where('brand', '!=', 'SEIKO');
            $products->where('brand', '!=', 'DUCATI');
            $products->where('brand', '!=', 'TAG HEUER');
            $products->where('brand', '!=', 'CITIZEN');
            $products->where('brand', '!=', 'ROLEX');
            $products->where('brand', '!=', 'DIOR');
            $products->where('brand', '!=', 'GUERLAIN');
            $products->where('brand', '!=', 'CREED');
            $products->where('brand', '!=', 'AMOUAGE');
        }
        if ($this->brand == "DUCATI") {
            $products->where('brand', '!=', 'CHANNEL');
            $products->where('brand', '!=', 'HUBLOT');
            $products->where('brand', '!=', 'SEIKO');
            $products->where('brand', '!=', 'TAG HEUER');
            $products->where('brand', '!=', 'CITIZEN');
            $products->where('brand', '!=', 'ROLEX');
            $products->where('brand', '!=', 'DIOR');
            $products->where('brand', '!=', 'GUERLAIN');
            $products->where('brand', '!=', 'CREED');
            $products->where('brand', '!=', 'AMOUAGE');
        }
        if ($this->brand == "TAG HEUER") {
            $products->where('brand', '!=', 'CHANNEL');
            $products->where('brand', '!=', 'HUBLOT');
            $products->where('brand', '!=', 'DUCATI');
            $products->where('brand', '!=', 'SEIKO');
            $products->where('brand', '!=', 'CITIZEN');
            $products->where('brand', '!=', 'ROLEX');
            $products->where('brand', '!=', 'DIOR');
            $products->where('brand', '!=', 'GUERLAIN');
            $products->where('brand', '!=', 'CREED');
            $products->where('brand', '!=', 'AMOUAGE');
        }

        if ($this->brand == "CITIZEN") {
            $products->where('brand', '!=', 'CHANNEL');
            $products->where('brand', '!=', 'HUBLOT');
            $products->where('brand', '!=', 'DUCATI');
            $products->where('brand', '!=', 'TAG HEUER');
            $products->where('brand', '!=', 'SEIKO');
            $products->where('brand', '!=', 'ROLEX');
            $products->where('brand', '!=', 'DIOR');
            $products->where('brand', '!=', 'GUERLAIN');
            $products->where('brand', '!=', 'CREED');
            $products->where('brand', '!=', 'AMOUAGE');
        }
        if ($this->brand == "SEIKO") {
            $products->where('brand', '!=', 'CHANNEL');
            $products->where('brand', '!=', 'HUBLOT');
            $products->where('brand', '!=', 'DUCATI');
            $products->where('brand', '!=', 'TAG HEUER');
            $products->where('brand', '!=', 'CITIZEN');
            $products->where('brand', '!=', 'ROLEX');
            $products->where('brand', '!=', 'DIOR');
            $products->where('brand', '!=', 'GUERLAIN');
            $products->where('brand', '!=', 'CREED');
            $products->where('brand', '!=', 'AMOUAGE');
        }
        if ($this->brand == "DIOR") {
            $products->where('brand', '!=', 'CHANNEL');
            $products->where('brand', '!=', 'HUBLOT');
            $products->where('brand', '!=', 'DUCATI');
            $products->where('brand', '!=', 'TAG HEUER');
            $products->where('brand', '!=', 'CITIZEN');
            $products->where('brand', '!=', 'ROLEX');
            $products->where('brand', '!=', 'SEIKO');
            $products->where('brand', '!=', 'GUERLAIN');
            $products->where('brand', '!=', 'CREED');
            $products->where('brand', '!=', 'AMOUAGE');
        }
        if ($this->brand == "GUERLAIN") {
            $products->where('brand', '!=', 'CHANNEL');
            $products->where('brand', '!=', 'HUBLOT');
            $products->where('brand', '!=', 'DUCATI');
            $products->where('brand', '!=', 'TAG HEUER');
            $products->where('brand', '!=', 'CITIZEN');
            $products->where('brand', '!=', 'ROLEX');
            $products->where('brand', '!=', 'DIOR');
            $products->where('brand', '!=', 'SEIKO');
            $products->where('brand', '!=', 'CREED');
            $products->where('brand', '!=', 'AMOUAGE');
        }
        if ($this->brand == "CREED") {
            $products->where('brand', '!=', 'CHANNEL');
            $products->where('brand', '!=', 'HUBLOT');
            $products->where('brand', '!=', 'DUCATI');
            $products->where('brand', '!=', 'TAG HEUER');
            $products->where('brand', '!=', 'CITIZEN');
            $products->where('brand', '!=', 'ROLEX');
            $products->where('brand', '!=', 'DIOR');
            $products->where('brand', '!=', 'GUERLAIN');
            $products->where('brand', '!=', 'SEIKO');
            $products->where('brand', '!=', 'AMOUAGE');
        }
        if ($this->brand == "AMOUAGE") {
            $products->where('brand', '!=', 'CHANNEL');
            $products->where('brand', '!=', 'HUBLOT');
            $products->where('brand', '!=', 'DUCATI');
            $products->where('brand', '!=', 'TAG HEUER');
            $products->where('brand', '!=', 'CITIZEN');
            $products->where('brand', '!=', 'ROLEX');
            $products->where('brand', '!=', 'DIOR');
            $products->where('brand', '!=', 'GUERLAIN');
            $products->where('brand', '!=', 'CREED');
            $products->where('brand', '!=', 'SEIKO');
        }


        return view('livewire.shop', [
            'products' => $products->get(),


        ])->layout('layouts.livewire');
    }
}
