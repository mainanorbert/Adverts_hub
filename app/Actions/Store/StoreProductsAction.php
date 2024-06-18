<?php

namespace App\Actions\Store;
use App\Http\Requests\StoreProductRequest;
use App\Models\Picture;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;




class StoreProductsAction{

 
    public function execute(User $user,StoreProductRequest $request){

        $trending=false;
        if($request->trending){

            $trending=true;

        }
        // dd($request->id);
        // $search_id=uniqid();
        $product=$user->devices()->create([

            'name' => $request->name,
            'brand' => $request->brand,
            'description' => $request->description,
            'price' => $request->price,
            'trending' => $trending,
            // 'search_id' =>$search_id,
            'user_id' => $user->id

        ]);
       

        $search_id=$product->id.uniqid().now()->diffInMicroseconds().now()->diffInRealSeconds();

        // $search_id=Crypt::encrypt($search_id);
        // dd($search_id);

        $product->update(['search_id'=>$search_id]);

        return $product;
        

   
    }
  

    public function storeFiles($product,StoreProductRequest $request){

        // dd($this->product->id);

        if ($request->has('files')) {
            foreach ($request->file('files') as $file) {
                
                
                
                $fileName = $file->hashName();
                $fileOriginalName = $file->getClientOriginalName();
                $fileSize = $file->getSize();
                Image::make($file)->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('storage/images/'.$fileName);

                

                Picture::create([
                    'file_name' => $fileName,
                    'file_original_name' => $fileOriginalName,
                    'file_size' => $fileSize,
                    'device_id' => $product->id
                ]);
                // $myfile->save('public/images/'.$fileName);
                // Storage::putFileAs('public/images', $file, $fileName);

            }
        }


    }
}