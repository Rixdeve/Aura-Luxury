<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    public function render()
    {
        $users = User::orderBy('name', 'asc')->get();
        return view('livewire.users', [
            'users' => $users,
        ])
            ->extends('layouts.admin');
    }
}
