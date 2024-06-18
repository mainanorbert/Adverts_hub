@extends('layouts.master')

@section('content')
    <div class="grid place-items-center  m-10 content-center">

        <form class=" bg-slate-600 mb-2 my-4 md:w-6/12 w-full border " action="/profiles/store" enctype="multipart/form-data"
            method="POST">
            @csrf
            <header class="flex w-full relative w-full">
                <div class="basis-3/4 text-center text-neutral-200 text-xl md:text-2xl font-bold">Update your profile here
                </div>
                <p class="basis-1/4 right-0 top-0 absolute">
                    <a href="/profiless"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg></a>
                </p>

            </header>
            <div class="m-3  md:ml-12">
                <div class='md:my-4'>
                    <label for="" class="text-neutral-300 font-semibold">Full Names</label><br>
                    <input class="md:w-8/12 h-8 bg-transparent text-sm text-white" type="text" name="name"
                        id="" placeholder="Full names"
                        value="{{ old('name') ?? (auth()->user()->profile->name ?? '') }}">
                    @error('name')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>


                <div class='my-4'>
                    <label for="" class="text-neutral-300 font-semibold">Phone Number</label><br>
                    <input class="md:w-8/12 h-8 bg-transparent text-white text-sm" type="text" name="phone"
                        id="" placeholder="Primary phone number..."
                        value="{{ old('phone') ?? (auth()->user()->profile->phone ?? '') }}">
                    @error('phone')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class='my-4'>
                    <label for="" class="text-neutral-300 font-semibold">Alternative Phone NUmber</label><br>
                    <input class="md:w-8/12 h-8 bg-transparent text-white text-sm" type="text" name="phone2"
                        id="" placeholder="Other phone..."
                        value="{{ old('phone2') ?? (auth()->user()->profile->phone2 ?? '') }}">
                    @error('phone2')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class='my-4'>
                    <label for="" class="text-neutral-300 font-semibold">Current Location</label><br>
                    <input class="md:w-8/12 h-8 bg-transparent text-white " type="text" name="location" id=""
                        placeholder="Your current location..."
                        value="{{ old('location') ?? (auth()->user()->profile->location ?? '') }}">
                    @error('location')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <label for="myfiles"
                    class='my-4 grid grid-cols-4 justify-center bg-slate-700 w-8/12 h-12 rounded pb-4 place-items-center'>

                    <div class="col-span-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-12 h-12">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>

                    <div class="flex col-span-2 w-full">
                        <span id="num_of_file" class="text-neutral-500 text-xs"></span>
                        <input class="w-8/12 h-8 hidden" type="file" name="photo" id="myfiles">
                    </div>
                </label>
                <button id="updating"
                    class="btn1 disabled:cursor-not-allowed w-full text-xl bg-green-400 p-2 mt-4 h-10 text-center rounded hover:text-white"><span
                        class="btn1">Update</span> </button>

                <div class="">

                </div>
            </div>
        </form>
        @if (auth()->user()->profile != null)
            <div class="grid place-items-center w-full">
                <form class="bg-slate-600 grid place-items-center p-2 md:w-6/12"
                    action="/images/{{ auth()->user()->profile->id }}" method="POST">
                    @method('DELETE')
                    <p class="text-center text-slate-200 font-semibold">Remove Profile photo</p>
                    <img class="w-16" src="{{ asset('/storage/profiles/' . auth()->user()->profile->photo) }}"
                        alt="">
                    @csrf

                    <Button class="text-red-500 font-bold"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </Button>
                </form>
            </div>
        @endif


    </div>

    <script src="{{ asset('js/countmyfiles.js') }}"></script>
@endsection
