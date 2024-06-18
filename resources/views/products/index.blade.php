@extends('layouts.master')
@section('content')
    <div class="h-screen">
        @if (session('message'))
            <div class="grid place-items-center h-8 top-1">
                <p class="text-neutral-200 bg-green-500 rounded w-6/12 p-2 text-center">{{ session('message') }}</p>
            </div>
            {{-- <div class="mt-12 text-center text-center left-12 text-red-400 text-xl" x-data="{ show: true }"
                x-init="setTimeout(() => show = false, 4000)" x-show="show">
                {{ session('message') }}
            </div> --}}
        @endif


        {{-- Display Page --}}
        <div class="flex justify-center w-full p-4 md:mt-0 mt-5 ">

            <div class=" md:w-6/12 w-10/12 relative rounded-xl">
                <img id="image" class="md:items-center rounded-xl md:w-[40rem] w-full md:h-[24rem] h-[15rem]"
                    src="{{ asset('/carousel/cctv.jfif') }}" alt="digital images">
                <button id="nextBtn" class="absolute right-[-0.7rem] md:right-[6rem] md:top-[8.5rem] top-[5.5rem] text-gray-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-12 h-12">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                  </svg>
                  </button>
                <button id="prevBtn" class="absolute left-[-0.8rem] md:top-[8rem] top-[6rem] text-gray-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-12 h-12">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                  </svg>
                  </button>
            </div>

        </div>

        {{-- Email Updates --}}
        <div class="flex text-xl justify-center items-center w-full md:my-1 py-1">
            <form class="flex justify-center p-0 items-center gap-4 space-x- w-1/12 md:w-8/12 w-full"
                action="{{ route('email.subscribe') }}" method="POST">
                @csrf

                <input class="md:w-10/12 md:h-8 bg-transparent h-6 rounded-xl px-4" type="email" name="email"
                    value="{{ old('search') }}" placeholder="Enter Your Email.....">
                <button
                    class="flex items-center md:text-xl text-sm px-4 text-lg bg-green-300 rounded-xl md:h-8 h-4 py-3"for="">Subscribe</button>

            </form>

        </div>
        
        <div class="w-full text-center bg-green-300 rounded">
            @error('email')
                <div class="text-sm text-red-800">{{ $message }}</div>
            @enderror
        </div>

        {{-- Trending Items --}}
        <div class="mx-10 bg-slate ">
            <div class="flex items-start w-full ">
                <h1 class="basis-3/4 w-full text-center text-bold text-neutral-200 md:text-4xl text-2xl mb-8">Trending Items
                </h1>

                {{-- Search Form For Trending Items --}}
                <form class="basis-1/4 right-0 top-0 flex justify-center p-0 items-center md:w-6/12"
                    action="{{ route('products') }}">

                    <input class="md:w-10/12 h-6 mr-0 rounded bg-slate-600 p-2 text-neutral-200 border" type="search"
                        name="search1" value="{{ old('search') }}" placeholder="Search trending items....">

                </form>

            </div>
            @if (count($trendings) == null)
                <p class="text-center text-gray-400 md:text-2xl font-medium">No Trending Items Found!</p>
            @endif

            <div class=" grid md:grid-cols-4 gap-3 ">
                @foreach ($trendings as $product)
                    <a class="bg-slate-500 w-9/12 border rounded-xl grid place-items-center p-1 ease-in-out hover:-translate-x-4 hover:scale-110 duration-700"
                        href="{{ route('product.show', $product) }}">
                        <div class=" text-neutral-200 font-bold text">
                            {{ $product->name }}
                        </div>
                        <div class="grid w-11/12 place-items-center ">
                            @if (count($product->pictures) != null)
                                <img class="h-48  w-full"
                                    src="{{ asset('storage/images/' . $product->pictures->first()->file_name) }}"
                                    alt="">
                            @else
                                <p>No Images</p>
                            @endif
                        </div>
                        <div class="w-full flex gap-4">
                            <p class="text-neutral-200">Brand: <span class="text-yellow-200">{{ $product->brand }}</span>
                            </p>
                            <p class="underline text-white ">@ {{ $product->price }}/=</p>
                        </div>
                        <div class="bg-green-600 rounded w-full text-xl text-center text-neutral-300 font-semibold">View
                            Details</div>
                    </a>
                @endforeach
            </div>


        </div>


        {{-- Other Products --}}

        <div class="mx-10 mt-4 mb-4 scroll-auto">
            <div class="flex items-start w-full ">
                <h1 class="basis-3/4 w-full text-center text-bold text-neutral-200 md:text-4xl mb-8">More Items</h1>

                {{-- Search other items --}}
                <form class="basis-1/4 right-0 top-0 flex justify-center p-0 items-center md:w-6/12 w-full"
                    action="{{ route('products') }}">

                    <input class="md:w-10/12 h-6 bg-slate-600 mr-0 border p-2 rounded text-slate-200" type="search items.."
                        name="search" value="{{ old('search') }}" placeholder="Search other item..">

                </form>

            </div>
            @if (count($products) == 0)
                <div class="text-2xl text-gray-400 text-center"> No Products Found !</div>
            @endif
            <div class="grid md:grid-cols-4 gap-3">


                @foreach ($products as $product)
                    <a class="bg-slate-500 w-9/12 border rounded-xl grid place-items-center p-1 ease-in-out hover:-translate-y-4 hover:scale-110 duration-700"
                        href="{{ route('product.show', $product) }}">
                        <div class=" text-neutral-200 font-bold">
                            {{ $product->name }}
                        </div>
                        <div class="grid w-11/12 place-items-center ">
                            @if (count($product->pictures) != null)
                                <img class="h-48 w-52 w-full "
                                    src="{{ asset('storage/images/' . $product->pictures->first()->file_name) }}"
                                    alt="">
                            @else
                                <p>No Images</p>
                            @endif
                        </div>
                        <div class="w-full flex gap-4">
                            <p class="text-neutral-200">Brand: <span class="text-yellow-200">{{ $product->brand }}</span>
                            </p>
                            <p class="underline text-white ">@ {{ $product->price }}/=</p>
                        </div>
                        <div class="bg-green-600 rounded w-full text-xl text-center text-neutral-300 font-semibold">View
                            Details</div>
                    </a>
                @endforeach
            </div>

        </div>
        <a href="https://web.facebook.com/?_rdc=1&_rdr" target="_blank"
            class="text-right bottom-[10rem] right-8 fixed text-white bg-blue-600 rounded-xl text-6xl px-4 py-1 mb-4">
            <p class="animate-ping absolute h-3 w-3 rounded-full text-blue-500">.</p>
            <p class="fa fa-facebook "></p>
        </a>

    </div>

    <a href="https://web.whatsapp.com/" target="_blank" class="text-right bottom-[6rem] right-8 fixed text-white   px-1 bg-green-600 rounded   text-6xl p">
        <p class="absolute top-0 animate-ping h-3 w-3 rounded-full text-green-500">.</p>
        <p class="fa fa-whatsapp "></p>
    </a>

    
    

    <script>
        const image=document.getElementById('image');
const nextBtn=document.getElementById('nextBtn');
const prevBtn=document.getElementById('prevBtn');

const images = ["{{asset('carousel/cctv.jfif')}}", "{{asset('carousel/gloves.jfif')}}", "{{asset('carousel/guns.jfif')}}"];


let imageIndex=0;
const interval=4000;
let carouselInterval;

function prevImage(){
    clearInterval(carouselInterval)
    imageIndex--;
    if(imageIndex<0){
        imageIndex=images.length-1;
         }
        image.src=images[imageIndex];
        carouselInterval=setInterval(nextImage,interval);


}

function nextImage(){
    imageIndex++;
    if(imageIndex>=images.length){
        imageIndex=0;
    }
    image.src=images[imageIndex];
}

carouselInterval=setInterval(nextImage,interval);
image.classList.add('opacity-100');

prevBtn.addEventListener('click',prevImage);
nextBtn.addEventListener('click',nextImage);
// image.addEventListener('load',function(){
//     image.classList.add('opacity-100');
// });
// const images = ["{{asset('carousel/cctv.jfif')}}", "{{asset('carousel/gloves.jfif')}}", "{{asset('carousel/guns.jfif')}}"];

    </script>
@endsection
