<?php

use App\Http\Controllers\CarouselController;
use App\Http\Controllers\EmailSubscriptionController;
use App\Http\Controllers\payments\MpesaController;
use App\Http\Controllers\payments\MpesaPaymentController;
use App\Http\Controllers\payments\PaypalController;
use App\Http\Controllers\payments\PaypalPaymentController;
use App\Http\Controllers\UserVerificationController;
use App\Mail\UpdateUserMail;
use App\Models\Device;
use App\Models\Product;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use Intervention\Image\Facades\Image;


use App\Http\Controllers\ResetPasswordController;

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/f', function () {
    return view('nober');
});


Route::view('nober', 'nober');

// Create User
Route::get('user', [RegistrationController::class, 'create'])->name('user.create');
Route::post('user', [RegistrationController::class, 'store']);

// Login form
Route::get('login', [RegistrationController::class, 'loguser'])->name('login');
Route::post('login/user', [RegistrationController::class, 'authenticate']);

// Logout User
Route::get('logout/user', [RegistrationController::class, 'logout']);


Route::controller(UserVerificationController::class)->group(function () {

    Route::get('email-verify/{id}', 'index')->name('email.verify');
    
    Route::post('email-verified/{id}/code', 'store')->name('email.verified');
    Route::post('email-verify/{id}/resend', 'resend')->name('route.resend');

});


// Password reset
Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('password/reset','reset')->name('password.reset');
    Route::post('password/reset', 'myreset')->name('reset');
    Route::get('password/change/{id}', 'index')->name('password.change');
    Route::post('password/change/{id}', 'passReset');

});


Route::get('/', [ProductsController::class, 'index'])->name('products');
Route::get('products/create', [ProductsController::class, 'create']);
Route::post('products/store', [ProductsController::class, 'store']);
Route::get('products/{product}', [ProductsController::class, 'show'])->name('product.show');
Route::get('product/{product}/edit', [ProductsController::class, 'edit'])->name('product.edit');
Route::put('myproducts/{product}/update', [ProductsController::class, 'update'])->name('update')->middleware('can:update,product');
Route::delete('myproducts/{product}', [ProductsController::class, 'destroy'])->name('product.delete');
Route::delete('images/{file}/delete', [ProductsController::class, 'delete']);





Route::get('myfiles', [UploadController::class, 'index']);
Route::post('myfiles', [UploadController::class, 'store'])->name('myfiles.store');

Route::get('getget', function () {
    return 'reee';
});

Route::get('test', function () {
    return view('test');
});

Route::get('test2', function () {
    return view('test2');
});

Route::get('profiless', [ProfileController::class, 'index']);
Route::get('profiles', [ProfileController::class, 'create'])->name('profiles.create');
Route::post('profiles/store', [ProfileController::class, 'store']);
Route::get('profiles/{profile}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::delete('profil/{profile}', [ProfileController::class, 'destroy'])->name('profile-destroy.delete');
Route::delete('images/{image}', [ProfileController::class, 'delete']);

// Route::post('add/{product}',[ProductsController::class,'card'])->name('add.cart');

Route::post('cartlists/{product}', [CartController::class, 'cart'])->name('add.cart');
Route::get('cartlist', [CartController::class, 'index'])->name('cartlist.index');
Route::delete('cartlists/{cart}', [CartController::class, 'destroy'])->name('cartlists.destroy');
Route::get('cartitems/email', [CartController::class, 'mymail'])->name('cartitems.email');

Route::controller(EmailSubscriptionController::class)->group(function () {
    Route::post('email-subscription', 'index')->name('email.subscribe');
});




Route::controller(MpesaPaymentController::class)->group(function () {
    Route::get('mpesa/pay/{mysum}', 'index')->name('index.mpesa');
    Route::post('mpesa/pay/{mysum}', 'store')->name('mpesa.pay');
    Route::post('/get-token/{mysum}', 'afriStkPush')->name('mympesa.pay');
    Route::post('/reg-url', 'registerUrl');
    Route::get('registerl', 'stkPush');

});

Route::controller(PaypalPaymentController::class)->group(function () {
    Route::get('paypal/pay/{mysum}', 'index')->name('index.paypal');

});


Route::view('java', 'javas.index');
Route::view('java2', 'javas.index2');
Route::view('java3', 'javas.index3');
Route::view('java4', 'javas.index4');
Route::view('java5', 'javas.projects.quotegenerator');
Route::view('java6', 'javas.projects.model');
Route::view('java7', 'javas.projects.accordion');
Route::view('java8', 'javas.projects.accord');
Route::view('java9', 'javas.projects.accord2');
Route::view('java10', 'javas.projects.dropdown');
Route::view('java11', 'javas.projects.accord3');

Route::view('lesson', 'javas.learn.lesson');
Route::view('lesson2', 'javas.learn.lesson2');

Route::view('classes', 'OOP.classes3');
Route::view('classes1', 'OOP.class_inheritence');
Route::view('classes1', 'OOP.class_inheritence');

Route::view('classes2', 'OOP.destructor');

Route::get('myemail', [RegistrationController::class, 'sendMail']);


Route::view('react3', 'react.index');



Route::get('test11', function () {

    // $products=Device::where('trending',true)->latest()->limit(4)->get();





    // return new UpdateUserMail($products);   
    // $products=Device::where('trending',true)->latest()->limit(4)->get();

    // $items = "";
    // foreach($products as $product){
    //     $items .= '<h2>';
    //     $items .= $product->name;
    //     $items .= '</h2>';
    //     $items .= '<br>';
    //     $items .=$product->price;



    // }
    // return $items;
    // return view('myproduct',compact('products'));
});

Route::view('test12', 'emails.update-user');

Route::get('myfil', function () {
    $image = Image::make('image.jfif')->resize(200, 200);

    return $image->response('png');
 });

//  Carousel Route

Route::controller(CarouselController::class)->group(function () {

    Route::get('/mycarousel', 'index');

});

Route::view('/about', 'others.index')->name('about.index');

Route::controller(AuthController::class)->group(function(){
    Route::get('regi', 'index');
    Route::post('register','register');
});

Route::controller(MpesaController::class)->group(function(){
    Route::get('mpesa/stk', 'index');
});