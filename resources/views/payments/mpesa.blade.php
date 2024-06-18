@extends('layouts.payments')

@section('content')
    <div class="p-10">
        <div class="grid grid-cols-6 justify-between items-center text-neutral-200 gap-8 text-2xl font-bold">
            <a class="" href="{{ route('cartlist.index') }}" title="Go Back"><svg xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-9">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                </svg>
            </a>
            <p class="col-span-3 w-full">Choose the payment method:</p>

        </div>
        <div class="flex gap-8 border-b md:w-4/12 w-5/12 text-neutral-300 font-semibold text-2xl py mt-4 ">
            <a class="{{ request()->routeIs('index.mpesa', $mysum) ? 'border-b-4' : '' }}"
                href="{{ route('index.mpesa', $mysum) }}">Mpesa</a>
            <a class="{{ request()->routeIs('index.paypal', $mysum) ? 'border-b-4' : '' }}"
                href="{{ route('index.paypal', $mysum) }}">PayPal</a>
        </div>
        <div class="grid place-items-center p-10 w-full">
            <div class="flex gap-2">
                {{-- <button id="registerUrl" class="bg-green-500 text-neutral-200 p-1 rounded">Register URl</button> --}}
                {{-- <button id="accessToken" class="bg-green-500 text-neutral-200 p-1 rounded">Access token</button> --}}
            </div>
            {{-- <div class="bg-green-400 w-4/12 m-1 p-1 flex">
                <div>Access token:</div>
                <div id="myToken" class="bg-green-500 text-white p-1 hover:underline"></div>
            </div> --}}
            <form class="border md:w-4/12 p-2 space-y-[4rem]" action="{{ route('mympesa.pay', $mysum) }}" method="POST">
                @csrf
                <p class="text-center text-neutral-200   text-4xl font-bold">Pay Via Mpesa</p>
                <div>
                    

                    <div class=" p-2 mt-0">

                        <label class="text-neutral-300 font-bold" for="">Phone Number</label>
                        <input class="w-full rounded h-8 bg-transparent text-neutral-400" type="number" name="phone"
                            id="" value="254" step="1" placeholder="e.g., 25499530000 0r 0799530000">
                        @error('phone')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class=" p-2 mt-2">
                        <label class="text-neutral-300 font-bold" for="">Amount</label>
                        <input class="w-full h-8 rounded bg-transparent text-neutral-400" type="text" name="amount"
                            id="" value="{{ $mysum }}" readonly>
                        @error('amount')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button class="w-full mt-10 mb-2 bg-green-500 h-10 font-bold text-2xl rounded text-neutral-300 text-xl">pay Now</button>

            </form>
        </div>
    </div>
    {{-- <script src="{{asset('js/mpesa')}}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    <script src="{{ asset('js/mpesa/mpesa.js') }}"></script>
@endsection
