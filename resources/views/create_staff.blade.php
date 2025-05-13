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

    <title>add staff</title>
</head>
<body>
    <div class = "container">
        <div class = "flex justify-between my-5">
          <h2 class = "text-red-500 text-xl">Add Staff</h2>
          <a href="/staff" class = "bg-green-600 text-white rounded py-2 px-4">Back to Staff</a>
        </div>

        <div>
            <form method = "POST" action="{{route('staff_store')}}" enctype = "multipart/form-data">
                @csrf

                <div class = "flex flex-col gap-5">
                <label for="">Name</label>
                <input type="text" name = "name" value = "{{old('name')}}" oninput="document.getElementById('name-error')?.remove();" class="text-black">
                @error('name')
                <p id = "name-error"  class = "text-red-600">{{$message}}</p>
                @enderror

                <label for="">Position</label>
                <input type="text" name="position" value="{{ old('position') }}" oninput="document.getElementById('position-error')?.remove();" class="text-black">
                @error('position')
                <p id = "position-error"  class = "text-red-600">{{$message}}</p>
                @enderror

                <div class="relative w-fit flex items-center gap-3">
                        <input 
                            type="file" 
                            name="photo"
                            onchange="document.getElementById('file-name').textContent = this.files[0]?.name || ''"
                            class="absolute left-0 top-0 w-full h-full opacity-0 cursor-pointer" oninput="document.getElementById('photo-error')?.remove();"
                        >
                        <div class="inline-block px-4 py-2 bg-gray-100 text-gray-800 rounded cursor-pointer">
                            Choose Photo
                        </div>
                        <span id="file-name" class="text-sm text-gray-100"></span>
                </div>
                    @error('photo')
                        <p id = "photo-error"  class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror

                <label for="">Phone</label>
                <div class="flex items-center">
                    <span class="px-3 py-2 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md text-black">+880</span>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="text-black border border-gray-300 rounded-r-md py-2 px-3 w-full" placeholder="1XXXXXXXXX">
                </div>

                <label for="">Facebook</label>
                <input type="url" name="facebook" value="{{ old('facebook') }}" placeholder="https://example.com" maxlength="255"  class="text-black">
                

                <label for="">Linkedin</label>
                <input type="url" name="linkedin" value="{{ old('linkedin') }}" placeholder="https://example.com" maxlength="255"  class="text-black">
                

                <label for="">Twitter</label>
                <input type="url" name="twitter" value="{{ old('twitter') }}" placeholder="https://example.com" maxlength="255"  class="text-black">
                

                <label for="">Priority</label>
                <input type="number" name="priority" value="{{ old('priority') }}" min="0"  class="text-black">
                

                <label for="">Created By</label>
                <input type="number" name="created_by" value="{{ old('created_by') }}" min="0" oninput="document.getElementById('created_by-error')?.remove();" class="text-black">
                @error('created_by')
                <p id = "created_by-error"  class = "text-red-600">{{$message}}</p>
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