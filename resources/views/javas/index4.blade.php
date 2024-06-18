@extends('layouts.master')

@section('content')
    <div class="m-10 w-full grid place-items-center">
        <div class="mydiv w-6/12 border-4 list-none bg-black grid place-items-center text-center rounded-xl">
            <ul id="sports" class="w-6/12 border-4 hidden rounded-xl grid place-items-center my-2">
                <li id="football" class="w-6/12 border-4 p-1 text-white rounded m-2 ">Football</li>
                <li id="basketball" class="w-6/12 border-4  border-2 p-1 text-white  rounded m-2">BasketBall</li>
                <li id="tennis" class="w-6/12 border-4  border-2 p-1 text-white  rounded m-2">Tennis</li>
                <li id="golf" class="w-6/12 border-4  border-2 p-1 text-white  rounded m-2">Golf</li>
            </ul>

            <button class="bg-green-300 rounded ">Button1</button>


        </div>

        <div class="mydiv w-6/12 border-4 list-none bg-black grid place-items-center text-center rounded-xl">
            <ul id="sports" class="w-6/12 border-4 hidden rounded-xl grid place-items-center my-2">
                <li id="football" class="w-6/12 border-4 p-1 text-white rounded m-2 ">Football</li>
                <li id="basketball" class="w-6/12 border-4  border-2 p-1 text-white  rounded m-2">BasketBall</li>
                <li id="tennis" class="w-6/12 border-4  border-2 p-1 text-white  rounded m-2">Tennis</li>
                <li id="golf" class="w-6/12 border-4  border-2 p-1 text-white  rounded m-2">Golf</li>
            </ul>

            <button class="mydiv" onclick="" class="bg-green-300 rounded">Button1</button>


        </div>

    </div>
    <script>
        document.querySelector('.mydiv').addEventListener('click', function(e) {
            const mybtn = e.target;

            if (mybtn.matches('ul')) {
                if (ul.classList.contains('hidden')) {
                    ul.classList.remove('hidden');
                } else {
                    ul.classList.add('hidden');
                }
            }
        })


        // Use of event Delegation for one event to effect changes all through
        // document.querySelector('#sports').addEventListener('click', function(e) {
        //     console.log(e.target.getAttribute('id') + ' is clicked');

        //     const target = e.target;
        //     if (target.matches('li')) {
        //         target.style.backgroundColor = 'LightGrey';
        //     }

        // });

        // document.querySelector('#football').addEventListener('click',function(event){
        //     setTimeout(function(){
        //         event.target.disabled=true;
        //         event.target.textContent='Clicked..';
        //     },0);
        // })

        // Add Text to event Listeners
        // // const x=document.getElementById('football');
        // x.addEventListener('click',function(e){
        //     setTimeout(function(){
        //         e.target.disabled=true;
        //         e.target.textContent="Clicked!";
        //     },8);
        // })
    </script>
@endsection
