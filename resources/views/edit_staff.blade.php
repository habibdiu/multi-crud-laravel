<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <!-- Select2 CSS -->
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

    <title>edit staff</title>
</head>
<body>
    <div class = "container">
        <div class = "flex justify-between my-5">
          <h2 class = "text-red-500 text-xl">Edit Staff</h2>
          <a href="/staff" class = "bg-green-600 text-white rounded py-2 px-4">Back to Staff</a>
        </div>

        <div>
            <form method = "POST" action="{{route('update_staff',$our_edit_staff)}}" enctype = "multipart/form-data">
                @csrf

                <div class = "flex flex-col gap-5">
                <label for="">Name</label>
                <input type="text" name = "name" value = "{{old('name',$our_edit_staff->name)}}" oninput="document.getElementById('name-error')?.remove();" class="text-black">
                @error('name')
                <p id = "name-error"  class = "text-red-600">{{$message}}</p>
                @enderror

                <label for="">Position</label>
                <input type="text" name="position" value= "{{old('position',$our_edit_staff->position)}}" oninput="document.getElementById('position-error')?.remove();" class="text-black">
                @error('position')
                <p id = "position-error"  class = "text-red-600">{{$message}}</p>
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

                <label for="">Phone</label>
                <div class="flex items-center">
                    <span class="px-3 py-2 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md text-black">+880</span>
                    <input type="text" name="phone" value= "{{old('phone',$our_edit_staff->phone)}}" pattern="\d{10}" maxlength="10" minlength="10" class="text-black border border-gray-300 rounded-r-md py-2 px-3 w-full" placeholder="1XXXXXXXXX">
                </div>
                @error('phone')
                <p  class = "text-red-600">{{$message}}</p>
                @enderror

                <label for="">Facebook</label>
                <input type="url" name="facebook" value= "{{old('facebook',$our_edit_staff->facebook)}}" placeholder="https://example.com" maxlength="255"  class="text-black">
                

                <label for="">Linkedin</label>
                <input type="url" name="linkedin" value= "{{old('linkedin',$our_edit_staff->linkedin)}}" placeholder="https://example.com" maxlength="255"  class="text-black">
                

                <label for="">Twitter</label>
                <input type="url" name="twitter" value= "{{old('twitter',$our_edit_staff->twitter)}}" placeholder="https://example.com" maxlength="255"  class="text-black">
                

                <label for="">Priority</label>
                <input type="number" name="priority" value= "{{old('priority',$our_edit_staff->priority)}}" min="0"  class="text-black">
                

                <label for="created_by">Created By</label>
                <select name="created_by" id="created_by"
                oninput="document.getElementById('created_by-error')?.remove();"
                 
                class="select2 w-full text-white">
                    <option>Select</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('created_by') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('created_by')
                    <p id="created_by-error" class="text-red-600">{{ $message }}</p>
                @enderror




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
                placeholder: "Select a user"
            });
        });
    </script>

</body>
</html>