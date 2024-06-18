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
        <button id="btn">Button</button>ddddsss
    </div>
</div>
    <script>

        let ul=document.querySelector('ul');
        let div=document.querySelector('div')

        console.log(div.childNodes)

        console.log(ul.previousSibling);
        console.log(ul.nextSibling);


        
        console.log(ul.previousElementSibling);
        console.log(ul.nextElementSibling);

        // console.log(ul.childNode);
        // console.log(ul.firstChild);
        // console.log(ul.lastChild);
        // ul.childNodes[3].style.backgroundColor='red';

        // ul.parentNode.style.backgroundColor='green';

        // console.log(ul.children);

        // console.log(ul.parentNode);
        // console.log(ul.parentElement.parentElement);

        // const html=document.documentElement;
        // console.log(html.parentNode);
        // console.log(html.parentElement);
  











        
        // Creating Elements
        //  const ul=document.querySelector('ul');
        //  const li=document.createElement('li');
        //  ul.append(li);
        //  ul.append(li);
        //  li.innerText='My Added lists';        //Adding Content to a List
        //  Modifying attributes and Classes
        // li.setAttribute('id','title');

        // li.remove();

        // const title=document.querySelector('title');

        // console.log(title.getAttribute('id'));
        // Remove elements
        


        //  Add content to Html Tag
        // const mySpan=document.querySelector('.list-class');
        // console.log(mySpan.innerText);
        // console.log(mySpan.textContent);
        // console.log(mySpan.innerHTML);
        
        //  console.log()
        // const mybt=document.getElementById('btn');
        // mybt.addEventListener('click',function(event){
        //     setTimeout(function(){
        //         event.target.disabled=true;
        //         event.target.textContent='Adding...';
        //         mybt.style.color='blue';
        //     },0)
        // })
        

        // console.log(mybt);

       

        
    </script>
</body>
</html>