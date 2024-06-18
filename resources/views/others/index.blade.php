@extends('layouts.master')

@section('content')

<div class="flex pt-6 gap-4 pr-[5rem]">
    <div class="bg-slate-900 w-3/12">
        <div class="text-center text-neutral-300 font-bold mt-4">Quick Links</div>

        <ul class="list-disc ml-2 text-center mt-8 space-y-4 text-blue-400">
            <li><a href="">Home</a></li>
            <li>About</li>
            <li> <a href="/products/create">Add Product</a></li>
            <li><a href="#footer">More Contacts</a></li>
            <li></li>
            <li></li>
        </ul>

    </div>


    <div class="bg-slate-00 w-8/12 p-1 text-white">

        <p class="text-xl text-white font-bold">About Adverts Hub</p>
        <p>Adverts Hub is an online platforms for startup businesses to advertse their products  in order reach a wider
             market. The website allows users to register and log in for them to enjoy the services provided.</p>
             <div>
                <p class="font-bold text-xl">A fully authorized user can do the following:</p>
                <ul class="list-disc px-8 text-white">
                    <li>Add product Name</li>
                    <li>Add name of product</li>                   
                    <li>Upload the different images for the product</li>
                    <li>The uses can edit or delete their products whenever they wish</li>
                </ul>
                <p>For customers, they are able to view products posted on the website. The latest products are found in the Trending section
                    while all other products are found on the section section.</p>
                    <p class="font-bold text-xl">Customers or visitors on the website can dow the following</p>
                    <ul class="list-disc px-8">
                        <li>View products</li>
                        <li>Add to cart</li>
                        <li>View products added to cart</li>
                        <li>Buy using Mpesa or PayPal</li>
                    </ul>
                    <div class="pl-8"><span class="font-bold">N/B: </span>
                        <ul class="list-disc">
                        <li>Users can only edit products added by them, this is to ensure no user deletes products of other users.</li>
                        <li>After 2 days (48 hours) all products added to cart will be 
                            deleted automatically, if the user may not have purchased them. This is due to changes in product brand and prices</li>

                        </ul>
                    </div>
             </div>
    </div>



    


</div>

    
@endsection