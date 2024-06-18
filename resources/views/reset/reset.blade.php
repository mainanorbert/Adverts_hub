@extends('layouts.payments')

@section('content')



    <div class="bg-slate-700 h-screen p-10">
        @if (session('message'))
            <div class="text-center flex justify-center ">
                <p class="w-6/12 bg-green-600 text-red-300">{{ session('message') }}</p>
            </div>
        @endif

        <div class=" flex">
            <p class="text-neutral-300 font-bold text-2xl px-[8rem] col-span-3">Reset Your password!! You will receive an email</p>
            <span class="text-white font-bold"><a href="{{route('login')}}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
              </a></span>
            
        </div>
        <form class="pl-[8rem] pt-8" action="{{ route('reset') }}" method="POST" class="grid mt-4">
            @csrf

            <div class="grid">
                <label for="email" class="text-neutral-300 font-bold">Enter Your email</label>
                <input class="w-4/12 text-neutral-200 rounded bg-transparent border-2" type="email" name="email"
                    id="email">
                @error('email')
                    <div class="text-red-400">{{ $message }}</div>
                @enderror
            </div>
            {{-- <div class="grid">
                <label for="myemail" class="text-neutral-300 font-bold">Enter Your New Passward</label>
                <input class="w-4/12 text-neutral-200 rounded bg-transparent border-2" type="password" name="password"
                    id="myemail">
                @error('password')
                    <div class="text-red-400">{{ $message }}</div>
                @enderror
            </div>
            <div class="grid">
                <label for="myemail" class="text-neutral-300 font-bold">Confirm Your Passord</label>
                <input class="w-4/12 text-neutral-200 rounded bg-transparent border-2" type="password"
                    name="password_confirmation" id="myemail">
                @error('password_confirmation')
                    <div class="text-red-400">{{ $message }}</div>
                @enderror
            </div> --}}
            <div class="mt-2">
                <button class="bg-green-600 rounded px-2 h-8 text-xl text-neutral-300 font-bold ">Submit</button>
            </div>
        </form>
    </div>
