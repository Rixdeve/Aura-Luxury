<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Orders as OrdersModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orders extends Component
{
    public $search = '';



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

        $orders = OrdersModel::orderBy('created_at', 'desc')->get();


        return view('livewire.orders', [
            'orders' => $orders,
        ])
            ->extends('layouts.admin');
    }
}
