@extends('layouts.app')

@section('title', 'Aura')

@section('content')

<div class="w-screen">
    <img src="{{ asset('images/banner.png') }}" alt="Aura banner" class="w-full h-auto">

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

<div class="p-4 max-w-6xl mx-auto">
    <div class="max-w-2xl mx-auto text-center">
        <h2 class="text-3xl font-bold text-slate-900 !leading-tight">What our happy Buyers say</h2>
        <p class="text-[15px] mt-6 leading-relaxed text-slate-600">See what our happy Recent Buyers have to say.</p>
    </div>

    <div
        class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-12 max-md:justify-center text-center max-lg:max-w-3xl max-md:max-w-lg mx-auto mt-16">
        <div>
            <div class="flex flex-col items-center">
                <img src="https://media.licdn.com/dms/image/v2/D5603AQGh2XO5M6gkqg/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1698849671190?e=1754524800&v=beta&t=Uf6fxS5k41Ye1eyKDN1b1vSfwUvl5h-wyzfkgBFCxIk"
                    class="w-24 h-24 rounded-full border-2 border-purple-600" />
                <div class="mt-6">
                    <h4 class="text-base font-semibold text-slate-900">Akila Bandara</h4>
                </div>
            </div>

            <div class="flex justify-center space-x-1 mt-3">
                <svg class="w-4 h-4 fill-purple-600" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                </svg>
                <svg class="w-4 h-4 fill-purple-600" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                </svg>
                <svg class="w-4 h-4 fill-purple-600" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                </svg>
                <svg class="w-4 fill-[#CED5D8]" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                </svg>
                <svg class="w-4 fill-[#CED5D8]" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                </svg>
            </div>

            <div class="mt-6">
                <p class="text-[15px] leading-relaxed text-slate-700 font-normal">Superb customer service! I had a small
                    issue and they resolved it right away. Highly recommend!</p>
            </div>
        </div>

        <div>
            <div class="flex flex-col items-center">
                <img src="https://media.licdn.com/dms/image/v2/D5603AQGzx-FxDgOxEQ/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1731265958579?e=1754524800&v=beta&t=rjeZrnX5g7wYsikwWizo8xOq63_xcBIHLTSOMP1JEYc"
                    class="w-24 h-24 rounded-full border-2 border-purple-600" />
                <div class="mt-6">
                    <h4 class="text-base font-semibold text-slate-900">Sanura Wijesiri</h4>
                </div>
            </div>

            <div class="flex justify-center space-x-1 mt-3">
                <svg class="w-4 h-4 fill-purple-600" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                </svg>
                <svg class="w-4 h-4 fill-purple-600" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                </svg>
                <svg class="w-4 h-4 fill-purple-600" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                </svg>
                <svg class="w-4 h-4 fill-purple-600" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                </svg>
                <svg class="w-4 h-4 fill-purple-600" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                </svg>
            </div>

            <div class="mt-6">
                <p class="text-[15px] leading-relaxed text-slate-700 font-normal">Beautiful packaging, exactly as
                    described, and exceeded my expectations. Thank you!</p>
            </div>
        </div>

        <div>
            <div class="flex flex-col items-center">
                <img src="https://media.licdn.com/dms/image/v2/D4E03AQF2ZjS-FTtMNQ/profile-displayphoto-shrink_200_200/B4EZRUGDehHAAY-/0/1736577661562?e=1754524800&v=beta&t=Hvw6LyplQ3_ywoiwBH5wNngDcT49M5_lZ1hnHsOYs3U"
                    class="w-24 h-24 rounded-full border-2 border-purple-600" />
                <div class="mt-6">
                    <h4 class="text-base font-semibold text-slate-900">Minaga Ranatunga</h4>
                </div>
            </div>

            <div class="flex justify-center space-x-1 mt-3">
                <svg class="w-4 h-4 fill-purple-600" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                </svg>
                <svg class="w-4 h-4 fill-purple-600" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                </svg>
                <svg class="w-4 h-4 fill-purple-600" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                </svg>
                <svg class="w-4 h-4 fill-purple-600" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                </svg>
                <svg class="w-4 fill-[#CED5D8]" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                </svg>
            </div>

            <div class="mt-6">
                <p class="text-[15px] leading-relaxed text-slate-700 font-normal">Absolutely love the Rolex! Great
                    quality and fast delivery. Will definitely shop again!</p>
            </div>

        </div>
    </div>
</div>

@endsection