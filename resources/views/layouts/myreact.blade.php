<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Learn React')</title>

    <script src="https://unpkg.com/react@18/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js" crossorigin></script>

    <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>

    @vite('resources/css/app.css')


</head>

<body class="h-screen">
    <div class="h-[15%]">@include('header')</div>

    <div class="h-full overflow-y-auto">
        @yield('content')
    </div>

    <div>
        @include('footer')
    </div>

</body>

</html>
