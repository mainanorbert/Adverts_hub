<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class CarouselController extends Controller
{

    public function index(){

        $images = Device::all();
        // dd($images);

        return view('carousel.index', compact('images'));
    }
    //
}
