<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Orders;

class OrderView extends Component
{
    public $order;

    public function mount($id)
    {
        $this->order = Orders::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.order-view', [
            'order' => $this->order,
        ])->extends('layouts.admin');
    }
}
