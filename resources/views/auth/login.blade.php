@extends('layouts.master')
@section('content')
    {{-- @if (session('message'))
<div x-data="{show:true}" x-init="setTimeout(()=>show=false,3000)" x-show="show">
    {{session('message')}}
</div>
    
@endif --}}

    @if (session('message'))
        {{-- <div class="top-8 text-center left-12 text-red-400 text-xl" x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)"
            x-show="show">
            {{ session('message') }}
        </div> --}}
        <div class="flex justify-center">
            <div class="text-green-600 bg-green-400 w-6/12 h-8 mt-2 rounded text-center">{{session('message')}}</div>
        </div>
    @endif

    <div class="flex justify-center bg-slate-70">

       <div class="w-full flex md:h-screen justify-center ">
        <form class="border md:w-3/12 mt-[5rem] rounded-xl space-y-4 md:h-[24rem]" action="/login/user" method="Post">

            @csrf

            <div class="grid grid-cols-4 w-full place-items-center">
                <p class="text-center col-span-3 md:text-4xl text-2xl basis-3/4 w-full right-0 text-neutral-200 font-bold ">
                    Login Here</p>
                <div class="grid place-content-end basis-1/4">
                    <a class="md:text-2xl w-full basis-1/4 text-white md:right-  rounded hover:border-slate-500"
                        href="{{route('products')}}"">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="md:w-10/12 pl-2 m-2">

                <label class="text-xl text-neutral-300 font-semibold my-2" for="email">Email</label> <br>
                <input class="w-full my-2 h-10 p-1 bg-transparent border rounded @error('email') border-red-600 border-2 text-red-500 @enderror" type="email" name="email"
                    value="{{ old('email') }}" placeholder="Enter Your Email............">
                @error('email')
                    <p class="text-sm text-red-300">{{ $message }}</p>
                @enderror
                <label class="text-xl text-neutral-300 font-semibold my-2" for="password"> Password</label> <br>
                <input class="w-full my-2 h-10 p-1 bg-transparent border rounded @error('email') border-red-700 border-2 text-red-400  @enderror" type="password" name="password"
                    value="{{ old('password') }}" placeholder="Enter Your Password............"><br>
                @error('password')
                    <p class="text-sm text-red-300">{{ $message }}</p>
                @enderror
                <input class="my-2" type="checkbox" name="remember">
                <label class="mt-2 text-sm text-neutral-300 font-semibold" for="">Remember Token</label><br>

                <button class=" hover:bg bg-green-500 text-neutral-300 font-bold h-10 my-2 rounded w-full md:text-2xl w-full">Submit</button>
            </div>

            <div class="flex justify-between text-sm py-2 text-right px-2 text-neutral-200 ">
                <p>Forgot Password? <span class="underline"><a href="{{route('password.reset')}}">Reset.</a></span></p><a href=""></a>
                <p>Not registered? <span><a class="underline" href="{{ route('user.create') }}">sign up.</a></span></p>
            </div>



        </form>

       </div>

    </div>
@endsection
