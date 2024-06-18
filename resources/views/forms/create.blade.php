<div class="pt-2 px-4 w-full items-center">
    <label class="text-xl text-neutral-300 font-semibold hover:text-white" for="name">Name</label> <br>
    <input class="w-full rounded h-10 bg-transparent text-neutral-200 @error('name') border-red-400 @enderror" value="{{old('name') ?? $product->name }}" type="text" name="name" id="Security Product" placeholder="Product name...">
    @error('name')
    <p class="text-red-500 text-sm">
        {{$message}}
    </p>
        
    @enderror
</div>
<div class="pt-2 px-4 w-full items-center">
    <label class="text-xl text-neutral-300 font-semibold hover:text-white" for="brand">Brand</label> <br>
    <input class="w-full rounded h-10 bg-transparent text-neutral-200 @error('brand') border-red-400 @enderror" value="{{old('brand')?? $product->brand}}" type="text" name="brand" id="Security Product" placeholder="Product Brand...">
    @error('brand')
    <p class="text-red-500 text-sm">
        {{$message}}
    </p>
        
    @enderror
</div>
<div class="pt-2 px-4 w-full items-center">
    <label class="text-xl text-neutral-300 font-semibold hover:text-white" for="description">Description</label> <br>
    <textarea class="w-full h-32 bg-transparent @error('description') border-red-400 @enderror text-neutral-200" value="" name="description" placeholder="Enter Description..." id="" cols="30" rows="10">{{old('description')?? $product->description}}</textarea>
    @error('description')
    <p class="text-red-500 text-sm">
        {{$message}}
    </p>
        
    @enderror
</div>
<div class="pt-2 px-4 w-full items-center">
    <label for="myfile" class="h-10 ">
        <p class="text-xl text-neutral-300 font-semibold hover:text-white">Upload Photo
            <span class="font-base text-neutral-500 text-xs" id="no_of_files"></span>
        </p>
        <div class="bg-slate-600 grid place-items-center rounded text-slate-400">
            <p>Upload images</p>
            <p> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
            </svg></p>

        </div>
        <input type="file" id="myfile" name="files[]" multiple style="display: none">

        <script src="{{asset('js/countfiles.js')}}">
      
        </script>

    </label>
</div>

<div class="pt-2 px-4 w-full items-center">
    <label class="text-xl  text-neutral-300 font-semibold hover:text-white" for="price">Price</label> <br>
    <input class="w-full @error('price') border-red-400 @enderror rounded md:h-10 text-neutral-200 p-4 bg-transparent" value="{{old('price') ?? $product->price}}" type="text" name="price" id="Security Product" placeholder="Product Price...">
    @error('price')
    <p class="text-red-500 text-sm">{{$message}}</p>
    @enderror
</div>

<div class="pt-2 px-4 w-full items-center">
    <label class="text-sm text-neutral-300 hover:text-white" for="trending">Mark Product as Trending</label> <br>
    <input class="w-2 rounded border text-xl p-2 bg-transparent text-green-700" id="trending" {{$product->trending ? 'checked' : ''}} type="checkbox" name="trending" id="Security Product">
    
</div>