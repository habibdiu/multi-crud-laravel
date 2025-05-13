<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>

    <style type="text/tailwindcss">
    @layer utilities {
      .container{
        @apply px-10 mx-auto;
      }
    }
  </style>

    <title>add testimonial</title>
</head>
<body>
    <div class = "container">
        <div class = "flex justify-between my-5">
          <h2 class = "text-red-500 text-xl">Add Testimonial</h2>
          <a href="/testimonial" class = "bg-green-600 text-white rounded py-2 px-4">Back to Testimonial</a>
        </div>

        <div>
            <form method = "POST" action="{{route('testimonial_store')}}" enctype = "multipart/form-data">
                @csrf

                <div class = "flex flex-col gap-5">
                    <label for="">Name</label>
                    <input type="text" name = "name" value = "{{old('name')}}" oninput="document.getElementById('name-error')?.remove();" class="text-black">
                    @error('name')
                    <p id = "name-error"  class = "text-red-600">{{$message}}</p>
                    @enderror
    
                    <label for="">Company Name</label>
                    <input type="text" name="company_name" value="{{ old('company_name') }}"  class="text-black">
                    

                    <label for="">Position</label>
                    <input type="text" name="position" value="{{ old('position') }}" oninput="document.getElementById('position-error')?.remove();" class="text-black">
                    @error('position')
                    <p id = "position-error"  class = "text-red-600">{{$message}}</p>
                    @enderror

                    <label for="">Message</label>
                    <textarea name="message" oninput="document.getElementById('message-error')?.remove();" class="text-black">{{ old('message') }}</textarea>
                    @error('message')
                    <p id = "message-error"  class = "text-red-600">{{$message}}</p>
                    @enderror


                    <div class="relative w-fit flex items-center gap-3">
                        <input 
                            type="file" 
                            name="photo"
                            onchange="document.getElementById('file-name').textContent = this.files[0]?.name || ''"
                            oninput="document.getElementById('photo-error')?.remove();"
                            class="absolute left-0 top-0 w-full h-full opacity-0 cursor-pointer"
                        >
                        <div class="inline-block px-4 py-2 bg-gray-100 text-gray-800 rounded cursor-pointer">
                            Choose Photo
                        </div>
                        <span id="file-name" class="text-sm text-gray-100"></span>
                    </div>
                    @error('photo')
                        <p id = "photo-error"  class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <label for="">Created By</label>
                    <input type="number" name="create_by" value="{{ old('create_by') }}" min="0"  class="text-black">
                    

                <div>
                <input type="submit" name="submit" class = "bg-green-600 text-white rounded py-2 px-4 inline-block">
                </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>