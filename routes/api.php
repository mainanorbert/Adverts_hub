<?php

use App\Http\Controllers\ArticlesController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\payments\MPESAResponseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function(Request $request){
        return $request->user();
    });
    Route::get('/logout', [AuthController::class, 'logout']);

});

Route::post('confirmation',[MpesaStkPushController::class,'confirmation']);

Route::controller( 'RegistrationController'::class)->group(function(){
    Route::post('/register', 'register');
    
});

Route::controller(AuthController::class)->group(function(){
    Route::post('register','register');
    Route::post('/login', 'login');
    Route::get('/users/{id}', 'getUser');
});
Route::controller(MPESAResponseController::class)->group(function(){
    Route::post('/validation', 'validation');
    Route::post('confirmation', 'confirmation');
});

Route::controller(ArticlesController::class)->group(function(){
    Route::post('add/article', 'store');
    Route::get('get/mypost', 'index');
    Route::delete('/delete/article/{id}', 'destroy');
    Route::get('edit/article/{id}', 'edit');
    Route::post('edit/article/', 'update');
});

