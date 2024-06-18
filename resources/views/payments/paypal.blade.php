@extends('layouts.payments')

@section('content')
    <div class="p-10">
        <div class="grid grid-cols-6 text-neutral-200 text-2xl font-bold">
            <a class="" href="{{route('cartlist.index')}}" title="Go Back"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-9">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
              </svg>
              </a>
            <p class="col-span-4">Choose the payment method:</p>
        </div>
        <div
            class="flex gap-8 border-b md:w-4/12 w-5/12 text-neutral-300 font-semibold text-2xl py mt-4 ">
            <a class="{{ request()->routeIs('index.mpesa', $mysum) ? 'border-b-4' : '' }}" 
                href="{{ route('index.mpesa', $mysum) }}">Mpesa</a>
            <a class="{{request()->routeIs('index.paypal',$mysum) ? 'border-b-4':''}}"
            href="{{route('index.paypal',$mysum)}}">PayPal</a>
        </div>
        <div class="grid place-items-center p-10 w-full">
            <form class="border md:w-4/12 p-2 space-y-[6rem]" action="">
            <p class="text-center text-neutral-200 text-4xl font-bold">Pay Via PayPal</p>

                <div class="space-y-10 bg-green-00">
                    
                    <div class=" p-2 mt-10 space-y-10">
                        <label class="text-neutral-300 text-2xl font-bold" for="">Amount</label>
                        <input class="w-full h-8 bg-transparent rounded text-neutral-400" type="text" name="" id="" value="{{$mysum}}" readonly>
                    </div>
                </div>

                <button class="w-full mt-10 mb-2 bg-green-500 h-10 rounded text-neutral-300 font-bold text-2xl">pay Now</button>

            </form>
        </div>
    </div>
@endsection