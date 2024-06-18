@extends('layouts..master')
@section('title', 'Add New Product')
@section('content')

    @if (session('message'))
        <div class="grid place-items-center text-center  top-0">
            <p class="text-red-700 bg-green-300 w-6/12 h-8 rounded">{{session('message')}}</p>
        </div>
    @endif

    <div class="container grid place-items-center mx-auto p-[6rem] ">

        <form class="grid md:w-6/12 mb-3 pb-4 border rounded-xl" action="/products/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="bottom-2 w-full md:w-12/12 pt-2">
                <p class="text-center  text-3xl text-neutral-200 font-bold">Add New Product</p>

                @include('forms.create')

                <div class="grid place-items-center mt-4">
                    <button id="mybtn2" class="w-10/12 bg-green-400 h-8 text-neutral-300 font-bold text-xl rounded">Add
                        Product</button>
                </div>

            </div>
        </form>

    </div>

    {{-- <script src="{{asset('js/countfiles.js')}}">
      
    </script> --}}


@endsection
