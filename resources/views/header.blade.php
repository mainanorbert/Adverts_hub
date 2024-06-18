<?php
use App\http\Controllers\CartController;
use App\Models\Cart;

if (Auth::check()) {
    $carts = Cart::cartItems();
    $price = Cart::where('user_id', auth()->user()->id)->get();
}
?>

<div
    class="mydiv  md:flex hidden lg:mx-auto bg-slate-900 relative items-center md:mt-0 md:pl-0 md:pt-0 pl-6 pt-8 
    justify-between md:gap-8 h-full w-full   ">

    <div class="md:flex block basis-1/2 md:my-4 my-8 items-center gap-2">
        <img class="p-2 rounded-full md:w-24 md:h-24 w-20 h-20 basis-1/6"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsiv7rLdOVwfrPfJxPHUG6RNPVilaL46dbwA&usqp=CAU"
            alt="">
        <p class="text-xl text-white grow hover:underline font-bold hover:text-yellow-600"><span
                class="hover:text-white text-2xl text-yellow-500 hover:border">Adverts</span> Hub</p>
        <div class="grid md:flex  w-full md:gap-10 hover:underline hover:text-white text-blue-500 ml-10">
            <a class="md:text-lg" href="{{ route('products') }}">Home</a>
            <a class="md:text-lg" href="{{route('about.index')}}">About</a>

            {{-- @can('isAdmin') --}}
                <a class="md:text-lg" href="/products/create">Add Product</a>
            {{-- @endcan --}}

        </div>
    </div>

    {{-- Contact --}}
    {{-- <span class="flex text-2xl basis-1/4 gap- items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="white" class="w-8 h-12">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.75 3.75L18 6m0 0l2.25 2.25M18 6l2.25-2.25M18 6l-2.25 2.25m1.5 13.5c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 014.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 00-.38 1.21 12.035 12.035 0 007.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 011.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 01-2.25 2.25h-2.25z" />
        </svg>
        <p class="grow md:text-lg text-neutral-300 font-semibold">Contact us: 0799535642</p>
    </span> --}}
    @auth
        <p class="font-semibold text-neutral-300 md:bg-green-600 px-1 hover:bg-green-700 hover:font-bold rounded-full"><a href="{{ route('cartlist.index') }}"><span>Cart</span>,
                {{ $carts }}</a></p>
    @endauth

    <div class="block md:flex md:gap-2 items-center">

        <div class="md:flex grid gap-2 text-lg w-full justify-between items-center  mr-2">
            @auth
                <select class="w-32 bg-transparent text-neutral-300 h-8 text-xs rounded-full" onchange="location=this.value" name=""
                    id="">
                    <option value="">Hi, {{ auth()->user()->name }}</option>
                    <option value="/profiless">My Profile</option>
                    <option value="/logout/user">Logout</option>
                </select>
            @else
                <a class="text-lg text-neutral-500 hover:text-neutral-200" href="/user">Registration</a>
                <a class="text-lg pr-4 text-neutral-500 hover:text-neutral-200" href="/login">Login</a>
            @endauth
        </div>

        <button onclick="myReveal()" class="mybt2 top-2 absolute left-2 text-neutral-300 md:hidden"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
          </button>

    </div>

</div>

<button onclick="myReveal()" class="mybt absolute md:hidden top-4 left-8 text-neutral-200 font-semibold"><svg xmlns="http://www.w3.org/2000/svg"
        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
    </svg></button>


<script>
    const myclk = document.querySelector('.mydiv');
    const mybutton=document.querySelector('.mybt');
    const mybutton2=document.querySelector('.mybt2');

    function myReveal() {
        if (myclk.classList.contains('hidden')) {
            myclk.classList.remove('hidden');
            mybutton.classList.add('hidden');
            mybutton2.classList.remove('hidden');

        } else {
            myclk.classList.add('hidden')
            mybutton.classList.remove('hidden');

        }
    }
</script>
