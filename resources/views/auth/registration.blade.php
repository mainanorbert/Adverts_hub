@extends('layouts.master')
@section('title', 'Register Here')
@section('content')

    <div class="grid place-items-center  bg-slate-700 h-screen">

        <form class="mt- border md:w-4/12 justify-center rounded-xl" action="/user" method="Post">
            @csrf
            <div class="flex gap-4 sm:gap justify-around w-full mx-10 items-center mt-2 mb-4">
                <p class="text-center md:text-4xl text-3xl text-neutral-300 font-bold hover:text-white focus:border-red-400">Register here
                </p>
                <a id="Go to home Page" class=" text-6xl hover:border-red-300" href="{{route('products')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="2"
                        stroke="white" class="w-10 h-10">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </a>
            </div>
            <div class=" right-20 w-11/12 h-full pl-4">
          <div class="w- full pl-8 text-neutral-200">
            <label class="text-xl pl-2 my-3 font-bold" for="name">Your Name</label> <br>
            <input class="w-full text-neutral-300 my-2 h-10 p-4 bg-transparent rounded" type="text" name="name"
                value="{{ old('name') }}" placeholder="Enter Your name............">
            @error('name')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
            <label class="text-xl pl-2 my-3 font-bold" for="email">Email</label> <br>
            <input class="w-full text-neutral-300 my-2 h-10 p-4 bg-transparent rounded" type="email" name="email"
                value="{{ old('email') }}" placeholder="Enter Your Email............">
            @error('email')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
            <label class="text-xl pl-2 my-3 font-bold" for="password"> Password</label> <br>
            <input class="w-full text-neutral-300 my-2 h-10 p-4 bg-transparent rounded" type="password" name="password"
                value="{{ old('password') }}" placeholder="Enter Your Password............">
            @error('password')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
            <label class="text-xl  pl-2 my-3 font-bold" for="password_confirmation">Confirm Password</label> <br>
            <input class="w-full text-neutral-300 my-2 h-10 p-4 bg-transparent rounded" type="password"
                name="password_confirmation" value="{{ old('password_confirmation') }}"
                placeholder="Confirm Your Password............">
            @error('password')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>

                <button class="ml-4  bg-green-500 w-full text-neutral-200 hover:bg-green-700 hover:font-bold my-2 rounded h-10 p-2 text-2xl">Submit</button>
            </div>


            <div class="text-right pr-12">
                <p class="text-sm text-neutral-200">Already Registered? <span><a class="underline"
                            href="{{route('login')}}">Login.</a></span></p>
            </div>


        </form>



    </div>
@endsection
