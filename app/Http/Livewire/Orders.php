<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Orders as OrdersModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orders extends Component
{

    public $products;
    public $orders;

    public function mount()
    {
        $this->orders = OrdersModel::all();
    }

    public function updateStatus($orderId, $newStatus)
    {
        $order = OrdersModel::where('_id', $orderId)->first();
        if ($order) {
            $order->status = $newStatus;
            $order->save();
            session()->flash('success', 'Order status updated successfully!');
        } else {
            session()->flash('error', 'Order not found.');
        }
    }


    public function render()
    {
        $this->orders = OrdersModel::all();

        return view('livewire.orders', [
            'orders' => $this->orders,
        ])
            ->extends('layouts.admin');
    }
}
