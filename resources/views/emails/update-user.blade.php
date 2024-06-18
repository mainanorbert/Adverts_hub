<div>


    <p>Hi {{$myData['name']}}, CentSys has new security products!! Checkout Now.</p>

    <h1>Super Trending Security Devices</h1>
    @foreach ($myData['products'] as $product)
    <ul class="list-disc">
        <li>{{$product->name}} @ {{$product->price}}</li>
    </ul>        
    @endforeach
    <div>We value you as our esteemed customer</div>
    <h5>Thank You</h5> <br>
   <span>@</span>{{config('app.name')}}



</div>