<?php
namespace App\Actions\Update;

use App\Http\Requests\ProductUpdateRequest;
use App\Models\Device;
use App\Models\Picture;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UpdateproductAction
{

    public function updateProduct(Device $device, ProductUpdateRequest $request)
    {

        $trending = false;
        if ($request->trending) {
            $trending = true;
        }

        $product = $device->update([

            'name' => $request->name,
            'brand' => $request->brand,
            'description' => $request->description,
            'price' => $request->price,
            'trending' => $trending

        ]);



    }

    public function updateFiles(Picture $images, Device $device, ProductUpdateRequest $request)
    {

        $device_id = $device->id;
        // dd($device_id);
        if ($request->has('files')) {
            foreach ($request->file('files') as $file) {


                $fileName = $file->hashName();
                $fileOriginalName = $file->getClientOriginalName();
                $fileSize = $file->getSize();



                $images->create([
                    'file_name' => $fileName,
                    'file_original_name' => $fileOriginalName,
                    'file_size' => $fileSize,
                    'device_id' => $device_id

                ]);

                Image::make($file)->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('storage/images/' . $fileName, 100);

                // Storage::putFileAs('public/images', $file, $fileName);
            }

        }
    }
}