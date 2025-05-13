<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>staff</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="navbar bg-base-100 shadow-sm">
        <div class="navbar-start">
          <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /> </svg>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
              <li>
                <a href="/slider" class="{{ request()->is('slider') ? 'bg-blue-500 text-white rounded' : '' }}">slider</a>
              </li>
              <li>
                <a href="/staff" class="{{ request()->is('staff') ? 'bg-blue-500 text-white rounded' : '' }}">Staff</a>
              </li>
              <li>
                <a href="/testimonial" class="{{ request()->is('testimonial') ? 'bg-blue-500 text-white rounded' : '' }}">Testimonial</a>
              </li>
            </ul>
            

          </div>
        </div>
        <div class="navbar-center hidden lg:flex">
          <ul class="menu menu-horizontal px-1">
            <li>
              <a href="/slider" class="{{ request()->is('slider') ? 'bg-blue-500 text-white rounded' : '' }}">slider</a>
            </li>
            <li>
              <a href="/staff" class="{{ request()->is('staff') ? 'bg-blue-500 text-white rounded' : '' }}">Staff</a>
            </li>
            <li>
              <a href="/testimonial" class="{{ request()->is('testimonial') ? 'bg-blue-500 text-white rounded' : '' }}">Testimonial</a>
            </li>
          </ul>
          
        </div>
        <div class="navbar-end">
        </div>
      </div>
      {{$slot}}
</body>
</html>