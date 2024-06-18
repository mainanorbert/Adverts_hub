<?php

namespace App\Http\Controllers;

use App\Actions\Store\StoreProductsAction;
use App\Actions\Update\UpdateproductAction;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Requests\StoreProductRequest;
use App\Jobs\DeleteProductJob;
use App\Jobs\StoreProductJob;
use App\Mail\CreateProductMail;
use App\Mail\ProductsWelcome;
use App\Models\Cart;
use App\Models\Device;
use App\Models\Picture;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
// use Intervention\Image\Response;
use Illuminate\Auth\Access\Response;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['create', 'edit', 'cart']);
    }
    public function index(Device $device)
    {


        $trendings = Device::trendingPosts();


        $products = Device::allPosts();





        return view('products.index', compact('products', 'trendings'));

    }
    public function show(Device $product)
    {
        // dd($product);
        $images = Picture::where('device_id', '=', $product->id)->get();

        return view('products.show', compact('product', 'images'));

    }

    public function create()
    {
        if (Gate::allows('isAdmin', Device::class)) {
            $product = new Device();
            return view('products.create', compact('product'));
        }
        return back()->with('message', 'Kindly, Contact Admin to Add a Product');
        // abort(403);
        // if(!Gate::allows('canView',Device::class)){
        //     abort(403);
        // }
        //    $this->authorize('create',Product::class);

    }



    public function store(StoreProductsAction $createProduct, StoreProductRequest $request)
    {

        $product = $createProduct->execute(auth()->user(), $request);
       

        $createProduct->storeFiles($product, $request);




        // if ($request->has('files')) {
        //     foreach ($request->file('files') as $file) {
        //         $fileName = $file->hashName();
        //         $fileOriginalName = $file->getClientOriginalName();
        //         $fileSize = $file->getSize();

        //         Picture::create([
        //             'file_name' => $fileName,
        //             'file_original_name' => $fileOriginalName,
        //             'file_size' => $fileSize,
        //             'device_id' => $product->id
        //         ]);
        //         Storage::putFileAs('public/images', $file, $fileName);

        //     }
        // }

        $mailData = 'You created a ' . $product->name . ' product at Centsys';

        // Mail::to(auth()->user()->email)->queue(new CreateProductMail($mailData));
        // Mail::to($request->user())->later(now()->addMicrosecond(),new CreateProductMail($mailData));




        return back()->with('message', 'You added ' . $product->name . ' product');

    }

    public function destroy(Device $product)
    {
        $this->authorize('delete', $product);

        $images = Picture::where('device_id', $product->id)->get();

        foreach ($images as $image) {

            if (Storage::exists('public/images/' . $image->file_name)) {

                Storage::delete('public/image/' . $image->file_name);
            }


        }


        // $this->authorize('delete',$product);

        // if(Storage::exists('public/images'.$product->pictures);
        $product->delete();

        return to_route('products')->with('message', 'A product Was deleted Successfully');

    }

    public function edit(Device $product)
    {
        if(!Gate::allows('canView',$product)){
            abort(403);
        }




        $files = $product->pictures;

        // $products=Product::upload()
        return view('products.edit', compact('product', 'files'));
    }
    public function update(ProductUpdateRequest $request, UpdateProductAction $updateProduct, Device $product, Picture $images)
    {
        
        if ($request->user()->cannot('update', $product)) {
            abort(403);

        }
        $updateProduct->updateProduct($product, $request);
        
        $updateProduct->updateFiles($images, $product, $request);
        





        //         $request->validate([
//             'name' => 'required',
//             'brand' => 'required',
//             'description' => 'required',
//             'price' => 'required',
//             'trending'=>'sometimes',
//             'files' => 'sometimes',
//             'files.*' => 'required|mimes:jpg,jpeg,png,jfif,gif',

        //         ]);

        //         $data=$request->only('name','brand','trending','description','price');
//         $data2=$request->only('name','brand','trending','description','price','files');

        //         $data2['product']=$product;

        //         $data['product']=$product;

        //         $trending = false;
//         if ($request->trending) {
//             $trending = true;
//         }
// $data['trending']=$trending;
//         StoreProductJob::dispatch($data);

        // if ($request->has('files')) {
        //     foreach ($request->file('files') as $file) {

        //         $fileName = $file->hashName();
        //         $fileOriginalName = $file->getClientOriginalName();
        //         $fileSize = $file->getSize();

        //         dd($product);

        //         $images->create([
        //             'file_name' => $fileName,
        //             'file_original_name' => $fileOriginalName,
        //             'file_size' => $fileSize,
        //             'device_id'=>$product->id

        //         ]);
        //         Storage::putFileAs('public/images', $file, $fileName);
        //     }

        // }


        // $this->authorize('update',$product);



        return to_route('products')->with('message', 'product was updated successfully');
    }

    public function delete(Picture $file)
    {
        if(File::exists(public_path('storage/images/'.$file->file_name))){
            File::delete(public_path('storage/images/' . $file->file_name));
        }
       

        $file->delete();


       



        return back()->with("message", "You Deleted one image");;
    }


}