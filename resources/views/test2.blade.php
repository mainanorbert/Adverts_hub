<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<title>@yield('title', 'CENTSYS')</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" referrerpolicy="no-referrer" />


@vite('resources/css/app.css')


</head>
<body class="bg-gray-300">

<div class="container m-10 bg-green-400">
    <div class="h-screen w-full">
        <h1 class="font-bold" id="title">Elements</h1>
      <ul>
        <li class="list-class">
             <span>My Span</span> 
             My list my list1</li>
        <li class="list-class">My list my list2</li>
        <li class="list-class">My list my list3</li>
        <li class="list-class">My list my list4</li>    
      </ul>
        <form action="">

            <button id="btn"  class="bg-blue-400 text-white p-1 rounded">Button
              
            </button>
        </form>
        <div class="bg-slate-600">
            <p>This is the people of Kenya</p>
            <p>This is the people of Nairobi</p>
            <button class="bg-blue-400 text-white p-1 space-x-4">Button2</button>
        </div>

        <div class="bg-slate-200">
            <p>This is the people of Kenya</p>
            <p>This is the people of Nairobi</p>
            <button id="btn3" class=" bg-blue-400 text-white p-1">Button3</button>
        </div>
    </div>
</div>
    <script src="../resources/js/">
// const mybtn=document.querySelector('button');

// function clickBtn(){
//     alert('You have clicked');
// }

// mybtn.addEventListener('click',clickBtn);

//  const mybtn2=document.getElementById('btn3');

// function clickBtn(){
//     mybtn2.sytle.backgroundColor='red';
// }

// mybtn2.addEventListener('mouseover',clickBtn);

var mybtn=document.getElementById('btn3');

mybtn.addEventListener('click' function(event){
    setTimeout(function(){
        event.target.disbled=true;
        event.target.textContent='adding';

    },0)
})


       ul.append(li)

        
    </script>
</body>
</html>