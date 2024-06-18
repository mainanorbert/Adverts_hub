@extends('layouts.master')
@section('content')
    @if (session('message'))
        <div class=" text-center w-full text-red-500 text-sm" x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show">
            {{ session('message') }}
        </div>
    @endif

    <div class="m-20 flex justify-center">
        
       @if ($totals != 0) 
       <div class="w-10/12 items-place-center justify-center">
        <p class="text-center text-neutral-200 font-bold text-2xl">Seletced Products</p>
        <table class=" w-full">

            <thead class="bg-green-700 border-b-2 text-neutral-300 font-semibold border-blue-500">
                <tr class="">
                    <th></th>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Due expiry (Hours)</th>
                    <th>View Item</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody class="bg-green-500">
               
                @foreach ($carts as $cart)
                    <tr class="border border-b-2 border-slate-800  text-center">
                        <td></td>
                        <td>{{ $cart->item_count }}</td>
                        <td>{{ $cart->product->name }}</td>
                        <td>{{ $cart->product->brand }}</td>
                        <td>{{ $cart->product->price * $cart->item_count }}</td>
                        <td class="text-red-800">{{$cart->time_expiry}} Hours remaining</td>
                        <td id="viewp" class=""><a class="text-blue-900 rounded p-1 m-y-4"
                                href="{{ route('product.show', $cart->product) }}">View Product</a></td>
                        <script>
                            const myview = document.getElementById('viewp');
                            myview.addEventListener('click', function(event) {
                                setTimeout(function() {
                                    event.target.disabled = true;
                                    event.target.textContent = "Loading Element..."
                                }, 5)
                            })
                        </script>
                        <td>
                            <form action="{{ route('cartlists.destroy', $cart) }}" method="POST">
                                @method('DELETE')
                                @csrf

                                <button class="text-red-900">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach



                <tr class="border border-green-400 text-center">
                    <td class="text-neutral-200">Total</td>
                    <td class="text-neutral-200"> {{ $totals }} </td>
                    <td></td>
                    <td class="text-neutral-200 font-bold text-right">Total Price</td>

                    <td class="text-neutral-200 font-bold text-right underline">{{ $mysum }} =/</td>
                    <td
                        class="m-2 text-white text-xl ">
                        <a class="transition ease-in-out  delay-150 hover:-translate-y-1 hover:scale-110 duration-300  rounded bg-green-700 hover:font-bold hover:bg-green-600 rounded-full
                         px-1" href="{{ route('index.mpesa', $mysum) }}">Pay Now</a>
                    </td>


                    <td title="More Items"> <a href="{{ route('products') }}"
                            class="flex justify-center text-green-300 font-bold">
                            <p>Add</p>
                            <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                        </a></td>
                </tr>
            </tbody>
        </table>


    </div>
    @else
    <div class="text-2xl text-neutral-600">No Items Selected</div>
    @endif

    </div>
@endsection
