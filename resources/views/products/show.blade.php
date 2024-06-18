@extends('layouts.master')

@section('content')
@section('title', 'Product Display Page')

<div class="grid grid-cols-4 place-items-center mt-8 text-slate-200 font-bold text-2xl">
    <a href="{{ route('products') }}" class=" left-1 top-1" title="Go Back"><svg xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
        </svg></a>

    <p class="col-span-2">View for <span class="text-green-400 border-b">{{ $product->name }}</span> Product</p>
</div>

<div class="  w-full">

    <div class="flex justify-center space-x-4  md:w-8/12 place-items-center">
        <div class="grid md:w-6/12  md:grid-cols-2 place-items-center">
            @foreach ($images as $image)
                <div>
                    <img class="w-48 h-48 m-2 rounded-2xl  p-1 ease-in-out hover:-translate-x-8 hover:scale-110 duration-700 "
                    src="{{ asset('storage/images/' . $image->file_name) }}" alt="">
                </div>
            @endforeach
            

        </div>
        <div class="fle justify-cente gap-8 mt-1 text-xl">

            <p class="text-black"> <i
                    class="6xl hover:text-white  text-yellow-300 rounded-full underline text-center">Name:</i>
                <span class="hover:bg-blue-600 px-2 hover:text-white text bold rounded-full">{{ $product->name }}</span>
            </p>
            <p class="text-black"> <i
                    class="6xl text-center hover:text-white text-yellow-300 rounded underline">Brand:</i>
                <span class="hover:bg-blue-600  px-2 hover:text-white rounded-full">{{ $product->brand }}</span>
            </p>
            <div class="flex justify-center mt-2 text-xl">
                <p class="bg-gray-400 p-1 rounded-full  hover:text-white hover:bg-gray-700">@ {{ $product->price }} /=</p>
            </div>


        </div>
    </div>

   

    <div class="text-center bg-gray-600 border  m-3 rounded-full p-3">
        <p class="text-yellow-300 text-2xl underline">Product Description:</p>
        {{ $product->description }}
    </div>

    {{-- @can('create', App\Models\Product::class) --}}

    <div class="flex justify-center mb-6 top-0 gap-12 mt-2 pb-4">
        {{-- @can('delete', $product) --}}

        @can('isAdmin')
            <a class=" rounded p-1 hover:text-white" title="Edit this Product" href="{{ route('product.edit', $product) }}">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>

                </span></a>




            <form action="{{ route('product.delete', $product) }}" method="POST">
                @csrf
                @method('DELETE')

                <button id="mybutton" onclick="myDelete()" class=" rounded p-1 hover:text-blue-300 hover:text-red-500"
                    title="Delete this Product"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </button>

            </form>
        @endcan

        <form action="{{ route('add.cart', $product) }}" method="POST">
            @csrf

            <button id="mycart" class="bg-green-300 p-1 rounded-xl hover:bg-green-500 hover:text-white">Add to
                Cart</button>
            <script>
                const mycart = document.getElementById('mycart');
                mycart.addEventListener('click', function(event) {
                    setTimeout(function() {
                        event.target.disabled = true;
                        event.target.textContent = "Adding to Cart..."
                    }, 6);

                });
            </script>

        </form>

        <script>
            function myDelete() {
                var results = confirm('You want to Delete')
                if (results) {

                    console.log('Deleted');

                }
            }
            // var btn=document.getElementById('mybutton');
            // btn.addEventListener('click', function(event){
            //     setTimeout(function(){

            //         event.target.disabled=true;
            //         event.target.textContent='Deleting..'

            //     },2);
            // })
        </script>
    </div>

    {{-- @endcan --}}



</div>
@endsection
