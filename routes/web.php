<?php

use App\Models\Staff;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TestimonialController;


// welcome page
Route::get('/', function () {
    return view('weolcome');
});



//Slider
Route::get('/slider', function () {
    return view('slider',['posts_slider'=>Slider::paginate(5)]);
})->name('home_slider');

Route::get('/create_slider', [SliderController::class, 'create_slider']);
Route::post('/slider_store', [SliderController::class, 'ourfilestore_slider'])->name('slider_store');

Route::get('/edit_slider/{id}', [SliderController::class, 'editData_slider'])->name('edit_slider');
Route::post('/update_slider/{id}', [SliderController::class, 'updateData_slider'])->name('update_slider');
Route::delete('/delete_slider/{id}', [SliderController::class, 'deleteData_slider'])->name('delete_slider');



//Staff
Route::get('/staff', function () {
    return view('staff',['posts_staff'=>Staff::with('creator')->paginate(5)]);
})->name('home_staff');

Route::get('/create_staff', [StaffController::class, 'create_staff']);
Route::post('/staff_store', [StaffController::class, 'ourfilestore_staff'])->name('staff_store');

Route::get('/edit_staff/{id}', [StaffController::class, 'editData_staff'])->name('edit_staff');
Route::post('/update_staff/{id}', [StaffController::class, 'updateData_staff'])->name('update_staff');
Route::delete('/delete_staff/{id}', [StaffController::class, 'deleteData_staff'])->name('delete_staff');





//Testimonial
Route::get('/testimonial', function () {
    return view('testimonial',['posts_testimonial'=>Testimonial::paginate(5)]);
})->name('home_testimonial');

Route::get('/create_testimonial', [TestimonialController::class, 'create_testimonial']);
Route::post('/testimonial_store', [TestimonialController::class, 'ourfilestore_testimonial'])->name('testimonial_store');

Route::get('/edit_testimonial/{id}', [TestimonialController::class, 'editData_testimonial'])->name('edit_testimonial');
Route::post('/update_testimonial/{id}', [TestimonialController::class, 'updateData_testimonial'])->name('update_testimonial');
Route::delete('/delete_testimonial/{id}', [TestimonialController::class, 'deleteData_testimonial'])->name('delete_testimonial');