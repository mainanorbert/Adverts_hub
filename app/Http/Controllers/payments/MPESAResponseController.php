<?php

namespace App\Http\Controllers\payments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MPESAResponseController extends Controller
{
    public function validation(Request $request)
    {
        Log::info("Validation endpoint was reached");
        Log::info($request->all());
    }
    public function confirmation(Request $request){
        Log::info('confirmation endpoint');
        Log::info($request->all());
    }
    //
}
