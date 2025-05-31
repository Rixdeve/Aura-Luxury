@extends('layouts.app')

@section('title', 'Aura')

@section('content')

<div class="w-screen">
    <img src="{{ asset('images/Banner.png') }}" alt="Aura banner" class="w-full h-auto">
    <button
        class="absolute top-full left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-[#FDFDFC] text-[#1b1b18] font-semibold py-4 px-6 rounded-full shadow-lg hover:bg-[#e3e3e0] transition duration-300">
        <a href="{{ route('shop') }}">Shop</a>
    </button>
</div>
<section class="py-12 px-4 max-w-6xl mx-auto">
    <h2 class="text-2xl md:text-3xl font-semibold text-center mb-8">Do it with aura.</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <!-- Images grid -->
        <div class="col-span-2 row-span-2">
            <img src="{{ asset('images/chanel.png') }}" alt="chanel" class="w-full h-full object-cover rounded">
        </div>
        <div class="col-span-2">
            <img src="{{ asset('images/rolex.jpg') }}" alt="rolex" class="w-full h-full object-cover rounded">
        </div>
        <div>
            <img src="{{ asset('images/ducati.jpg') }}" alt="ducati" class="w-full h-full object-cover rounded">
        </div>
        <div>
            <img src="{{ asset('images/hublot.jpg') }}" alt="hublot" class="w-full h-full object-cover rounded">
        </div>
    </div>
</section>


@endsection