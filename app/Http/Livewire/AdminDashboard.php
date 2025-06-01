<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Orders;


use Livewire\Component;


class AdminDashboard extends Component
{

    public $totalOrders;
    public $totalUsers;
    public $totalSales;

    public function mount()
    {
        $this->totalOrders = Orders::count();
        $this->totalUsers = User::count();
        $this->totalSales = Orders::sum('total_amount');
    }

    public function render()
    {
        return view(
            'livewire.admin-dashboard'
        )->extends('layouts.admin');
    }
}
