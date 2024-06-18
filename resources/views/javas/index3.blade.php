@extends('layouts.master')

@section('content')

<div  class="m-10">
    <button onclick="reveal()" ><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
      </svg>
      </button>
      <p class="par" id="">Market share represents the percentage of an industry, or a market's total sales, that is earned by a particular company over a specified time period. · Market ...Market share represents the percentage of an industry, or a market's total sales,]
         that is earned by a particular company over a specified time period. · Market ...Market share represents 
         the percentage of an industry, or a market's total sales, that is earned by a particular company over a 
         specified time period. · Market ...

      </p>
</div>

<script>
    // const mybtn=document.querySelector('button');
    const mypar=document.querySelector('.par');
    function reveal(){
        if(mypar.classList.contains('hidden')){
        mypar.classList.remove('hidden')
    }
    else{
        mypar.classList.add('hidden')
    }
    }
// mybtn.addEventListener('click',reveal());
</script>

<div class="m-10 flex justify-center bg-green-400">
    <nav class="mynav4 md:flex hidden  gap-20 gap-x-10 justify-center w-full ">
        <a href="">Link 1 </a>
        <a href="">Link 2</a>
        <a href="">Link 3</a>
        <a href="">Link 4</a>
    </nav>
<button class="flex md:hidden " onclick="reveal4()" >ff<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
  </svg>
  </button>
    <script>
        const mx=document.querySelector('.mynav4')

        function reveal4(){
            if(mx.classList.contains('hidden')){
                mx.classList.add('hidden')
            }
            else{
                mx.classList.remove('hidden')
            }
        }
    </script>

</div>

<div class="m-12 bg-blue-300 relative ull">
    <nav class="mynav1 md:flex hidden grid gap-8 basis-3/4  bg-green-500">
        <a href="">login </a>
        <a href="">About</a>
        <a href="">Home</a>
        <a href="">Contact</a>

    </nav>
    <button onclick="reveal2()" class="mybtn1 absolute md:hidden right-0 top-1 basis-1/4 mr-2 "><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
      </svg></button>
</div>

<script>
    const myna=document.querySelector('.mynav1');
    const myb=document.querySelector('button');

    function reveal2(){
        if(myna.classList.contains('hidden')){
            myna.classList.remove('hidden')
            // myna.classList.add('flex-col')
        }
        else{
            myna.classList.add('hidden')
            // myna.classList.add('flex-col')
        }
       
    }
    // myb.addEventListener('click',reveal2);

</script>
{{-- Event Propagations in Laravel --}}

<div class="m-10 flex justify-center bg-blue400 ">
    <div class="div1 text-center grid place-items-center pb-4  w-3/12 border-4 h-40 bg-red-300 border-green-400 rounded-xl">
        2
        <div class="div2 text-center pb-2 place-self-center w-10/12 grid place-items-center bg-green-400 h-20 border-green-800 rounded-xl border-4 ">
            1
            <a href="" class="mybutton border place-self-center px-1 w-6/12 text rounded">Click</a>
        </div>

    </div>
    <script>
        window.addEventListener('click',function(){
            console.log("window");
        },true);
        document.addEventListener('click',function(){
            console.log("document");
        },true)
        document.querySelector('.div1').addEventListener('click',function(event){
            event.stopPropagation();
            console.log("div1");
        },{once:false})
        document.querySelector(".div2").addEventListener('click',function(){
            console.log('div2');
        },true)
        document.querySelector(".mybutton").addEventListener('click',function(e){
            e.preventDefault()
            console.log(e.target.textContent="Clicked");
        },true);
    </script>

</div>
    
@endsection