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

    <title>add slider</title>
</head>
<body>
    <div class = "container">
        <div class = "flex justify-between my-5">
          <h2 class = "text-red-500 text-xl">Add Slider</h2>
          <a href="/slider" class = "bg-green-600 text-white rounded py-2 px-4">Back to Slider</a>
        </div>

        <div>


          {{-- To check where getting error in the form --}}
          {{-- @if ($errors->any())
          <div class="bg-red-200 text-red-700 p-4 mb-4 rounded">
              <ul class="list-disc pl-5">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif --}}

            <form method = "POST" action="{{route('slider_store')}}" enctype = "multipart/form-data">
                @csrf

                <div class = "flex flex-col gap-5">
                    <label for="">Title</label>
                    <input type="text" name = "title" value = "{{old('title')}}" oninput="document.getElementById('title-error')?.remove();" class="text-black">
                    @error('title')
                    <p id = "title-error"  class = "text-red-600">{{$message}}</p>
                    @enderror
    
                    <label for="">Tags</label>
                    <input type="text" name="tags" value="{{ old('tags') }}"  class="text-black">
                    

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

                    <label for="">Priority</label>
                    <input type="number" name="priority" value="{{ old('priority') }}" min="0" oninput="document.getElementById('priority-error')?.remove();" class="text-black">
                    @error('priority')
                    <p id = "priority-error"  class = "text-red-600">{{$message}}</p>
                    @enderror


                <div>
                <input type="submit" name="submit" class = "bg-green-600 text-white rounded py-2 px-4 inline-block">
                </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>