<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" name="csrf-token" content="{{csrf_token()}}">




    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> --}}

    <!-- Latest compiled and minified JavaScript -->
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}


    <title>@yield('title', 'CENTSYS')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"
        referrerpolicy="no-referrer" />

    @vite('resources/css/app.css')
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}


    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}

    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    {{-- <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="bg-slate-800">
    <div class="">
        <div class="md:h-[15%]">
            @include('header')
            {{-- {{ View::make('header') }} --}}
        </div>

        <div class="overflow-y-auto h-screen bg-slate-70">

            @yield('content')

        </div>

        <div class="bg-black text-center p-2 text-white flex justify-around" id="footer">

            <div class="pt-2">
                <div>©Norbert Osiemo (2023)</div>
                <div>Vision: <span class="underline">To reach atleast 1 billion online shoppers globally</span></div>
                <div>Mission: <span class="underline">To best online marketing website in 21st century</span></div>
                
            </div>
            
            <div>
                <p class="flex pt-2 pl-1"><svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="white" class="w-8 h-12">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 3.75L18 6m0 0l2.25 2.25M18 6l2.25-2.25M18 6l-2.25 2.25m1.5 13.5c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 014.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 00-.38 1.21 12.035 12.035 0 007.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 011.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 01-2.25 2.25h-2.25z" />
                </svg> <span>0799535642</span>
            </p>
            <div>
                <a href="https://twitter.com/mainanorbert2" target="_blank" class="text-blue-500 text-4xl  h-8" ><i class="fa fa-twitter"></i></a>
                Twitter
            </div>
    
            </div>
            <div class="mt-2">
                <p>Email: mainanorbert@gmail.com</p>
                <form class="mt-2" action="{{route('email.subscribe')}}" method="POST">
                @csrf
                    <div class="font-bold">Receive Our Latest Updates</div>
                    <div class="flex gap-2">
                        <input class="h-8 rounded text-sm" type="email" value="" name="email" placeholder="Enter Your Email...">
                        <button class="justify-center p-1 bg-green-500 rounded">Subscribe</button>
                    </div>
                    @error('email')
                        <p class="text-red-400 ">{{$message}}</p>
                    @enderror
                </form>
            </div>
    

        </div>

    </div>


</body>

</html>
