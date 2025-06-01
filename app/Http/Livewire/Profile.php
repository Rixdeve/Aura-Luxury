<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\Orders;

use Livewire\Component;

class Profile extends Component
{
    public $user;
    public $orders;

    public function mount()
    {
        $this->user = Auth::user();
        $this->orders = Orders::where('user_id', $this->user->id)->latest()->get();
    }



    public function render()
    {
        return view('livewire.profile')
            ->layout('layouts.livewire');
    }
}
