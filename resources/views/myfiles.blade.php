@extends('layouts.master')

@section('content')

<div class="container">
    <div class="flex justify-center mt-8 w-8/12">
        <form action="/myfiles" method="POST" enctype="multipart/form-data">
            @csrf
            <div>

                {{-- <div>
                    <label for="files">Image Name</label>
                    <input type="text" name="name">
                </div> --}}

                <div>
                    <label for="files">Upload files</label>
                    <input type="file" name="files[]" id="file" accept="image/*" multiple>
                </div>
                
            </div>
            <button class="btn btn-success mt-10">Submit Files</button>
        </form>
    </div>

</div>
    
@endsection