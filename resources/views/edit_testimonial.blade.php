<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>

    <style type="text/tailwindcss">
    @layer utilities {
        .container {
        @apply px-10 mx-auto;
        }
    }

    /* Style the main select2 box (the part you click) */
    .select2-container--default .select2-selection--single {
        background-color: #383c42;
        border: 1px solid #f9fafb;
        height: 48px !important;
        display: flex;
        align-items: center;
        padding: 10px 12px;
        font-size: 1rem;
        color: #ffffff;
    }

    /* Arrow in the select box */
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 100% !important;
        top: 0px !important;
    }

    /* Text inside the select box */
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: normal !important;
        color: #ffffff;
    }

    /*Dropdown list styling */
    .select2-container--default .select2-results__options {
        background-color: #2d2e30;
        max-height: 300px !important;
        overflow-y: auto;
    }

    /* Each dropdown option */
    .select2-container--default .select2-results__option {
        color: #ffffff;
        line-height: 2rem;
        padding: 10px 12px;
    }

    /* Highlighted option on hover */
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #374151;
    }

    /* 🔍 Search input in dropdown */
    .select2-container--default .select2-search--dropdown .select2-search__field {
        background-color: #aeaeae !important;
        color: #1c1c1c !important;
        border: 1px solid #4b5563;
        padding: 10px;
    }
    </style>



    <title>edit testimonial</title>
</head>
<body>
    <div class = "container">
        <div class = "flex justify-between my-5">
          <h2 class = "text-red-500 text-xl">Add Testimonial</h2>
          <a href="/testimonial" class = "bg-green-600 text-white rounded py-2 px-4">Back to Testimonial</a>
        </div>

        <div>
            <form method = "POST" action="{{route('update_testimonial',$our_edit_testimonial)}}" enctype = "multipart/form-data">
                @csrf

                <div class = "flex flex-col gap-5">
                    <label for="">Name</label>
                    <input type="text" name = "name" value = "{{old('name',$our_edit_testimonial->name)}}" oninput="document.getElementById('name-error')?.remove();" class="text-black">
                    @error('name')
                    <p id = "name-error" class = "text-red-600">{{$message}}</p>
                    @enderror
    
                    <label for="">Company Name</label>
                    <input type="text" name="company_name" value= "{{old('company_name',$our_edit_testimonial->company_name)}}"  class="text-black">
                    

                    <label for="">Position</label>
                    <input type="text" name="position" value= "{{old('position',$our_edit_testimonial->position)}}" oninput="document.getElementById('position-error')?.remove();" class="text-black">
                    @error('position')
                    <p id = "position-error"  class = "text-red-600">{{$message}}</p>
                    @enderror

                    <label for="">Message</label>
                    <textarea name="message" oninput="document.getElementById('message-error')?.remove();" class="text-black">{{old('message',$our_edit_testimonial->message)}}</textarea>
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

                    <label for="create_by">Created By</label>
                    <select name="create_by" id="create_by"
                        class="select2 w-full text-white">
                        <option>Select</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('create_by') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                  

                <div>
                <input type="submit" name="submit" class = "bg-green-600 text-white rounded py-2 px-4 inline-block">
                </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Select2 Input --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select a user",
            });
        });
        
    </script>
</body>
</html>