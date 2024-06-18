<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Upload;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Intervention;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Profile $profile)
    {







        return view('profiles.index');


        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Profile $profile)
    {


        return view('profiles.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'phone2' => 'sometimes',
            'photo' => 'sometimes|mimes:jpeg,jpg,png,gif,jfif,bmp'

        ]);

        $file = $request->photo;

        $profile = Profile::where('user_id', auth()->user()->id)->first();
        if ($profile == null) {
            $data['user_id'] = auth()->user()->id;

            if ($request->has('photo')) {
                $fileName = $request->file('photo')->hashName();
                $data['photo'] = $fileName;

                Image::make($file)->resize(100,100)->save('storage/profiles/'.$fileName,100);
            }
            Profile::create($data);

        } else {

            Storage::delete('storage/profiles/' . $profile->photo);

            if(File::exists(public_path('storage/profiles/'.$profile->photo))){
                File::delete(public_path('storage/profiles/' . $profile->photo));
            }
            if ($request->has('photo')) {
                $fileName = $request->file('photo')->hashName();
                $data['photo'] = $fileName;

                Image::make($file)->resize(200, 200)->save('storage/profiles/' . $fileName,100);

                // Image::make($file)->resize(null, 200, function ($constraint) {
                //     $constraint->aspectRatio();
                // })->save('storage/profiles/'.$fileName,100);


                // Storage::putFileAs('public/profiles', $file, $fileName);
              

            }

            $profile->update($data);


        }



        // $fileName=null;

        // if($request->hasFile('photo')){

        //     $fileName=$request->file('photo')->hashName();

        //     Storage::putFileAs('public/profiles',$file,$fileName);
        // }    

        // Profile::updateOrCreate([

        //     'user_id'=>auth()->user()->id,
        //     'name'=>request()->name,
        //     'email'=>request()->email,
        //     'location'=>request()->location,
        //     'phone'=>request()->phone,
        //     'phone2'=>request()->phone2,
        //     'photo'=>$fileName
        // ]);   


        return redirect('profiless')->with('message', 'profile was successfully created');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        // if(Storage::exists('storage/profiles/'.$profile->photo)){
        //     Storage::delete('storage/profiles/' . $profile->photo);
        // }

        if(File::exists(public_path('storage/profiles/'.$profile->photo))){
            File::delete(public_path('storage/profiles/' . $profile->photo));
        }
        else{
            dd('File does not exist');

        }
        $profile->delete();

        return redirect('profiless');

        //
    }

    public function delete(Profile $image)
    {

        // $image=auth()->user()->profile->photo;
        $image->update(['photo' => null]);


        return back();
    }
}