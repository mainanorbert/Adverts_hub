@extends('layouts.master')

@section('content')
    <div class="p-10 grid place-items-center mt-10 b0 w-full">
        <div class="w-3/12 grid mt-10 border-white place-items-center bg-slate-500 p-2 rounded-xl"
            style="background-image: url('data:image/jpeg;base64,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')">
            <p class="text-2xl text-center bg-black text-white border-2 w-full  rounded-xl">JS Quote Generator</p>
            <div class="bg">
                <div class="text-center bg-white my-2 rounded-xl">
                    <p class="quote">Sir, my concern is not whether God is on our side; my greatest concern is to be on
                        God's side,
                        for God is always right.</p>
                    <p class="person p-3 uppercase">~Abraham Lincoln</p>
                </div>
            </div>

            <button id="newQuote"
                class="bg-black text-white border  w-5/12 p-2 h-12 font-bold text-xl text-center rounded ">New Quote</button>


        </div>
    </div>

    <script>
        let btn = document.querySelector('#newQuote');
        let myquote = document.querySelector('.quote');
        let myperson = document.querySelector('.person')

        const quotes = [{
                quote: '“Education is the most powerful weapon which you can use to change the world.”',
                person: "Nelson Mandela"
            },
            {
                quote: '“It is in your hands to make a better world for all who live in it.”',
                person: "Mahatma Gadhi"
            },
            {
                quote: '"Our lives begin to end the day we become silent about things that matter."'
                ',
                person: 'Luther King'
            },
        ];

        btn.addEventListener('click', function() {
            let random = Math.floor(Math.random() * quotes.length);
            myquote.innerText = quotes[random].quote;
            myperson.innerText = quotes[random].person;
        })
    </script>
@endsection
