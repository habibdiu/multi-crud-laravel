<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function create_slider(){
        
        $slider = Slider::all();
        return view('create_slider', compact('slider'));
    }
    public function ourfilestore_slider(REQUEST $request){

        $validated = $request->validate([
            'title' => 'required',
            'tags' => 'nullable',
            'photo' => 'required|mimes:png,jpg,bmp,tiff,pdf',
            'priority' => 'required',
        ]);

        //Upload photo
        $photoName = null;
        if(isset($request->photo)){
            
            $photoName = time().'.'.$request->photo->extension();
            $request->photo-> move(public_path('photos'),$photoName);
        }

        //Add new photo
        $slider = new Slider;

        $slider->title = $request->title;
        $slider->tags = $request->tags;
        $slider->priority = $request->priority;
        $slider->photo = $photoName;
        
        $slider->save();
        
        return redirect()->route('home_slider')->with('success','Your slider has been created');
    }

    public function editData_slider($id){
        $slider = Slider::findOrFail($id);
        return view('edit_slider',['our_edit_slider' => $slider]);
    }

    public function updateData_slider($id, Request $request){
        
        $validated = $request->validate([
            'title' => 'required',
            'tags' => 'nullable',
            'photo' => 'required|mimes:png,jpg,bmp,tiff,pdf',
            'priority' => 'required',
        ]);

        //Update Data
        $slider = Slider::findOrFail($id);
        
        $slider->title = $request->title;
        $slider->tags = $request->tags;
        $slider->priority = $request->priority;

        //Update photo
        if(isset($request->photo)){
        
            $photoName = time().'.'.$request->photo->extension();
            $request->photo-> move(public_path('photos'),$photoName);
            $slider->photo = $photoName;
        }
        
        
        $slider->save();
        
        return redirect()->route('home_slider')->with('success','Your slider has been Upated');
        
    }

    public function deleteData_slider($id){

        $slider = Slider::findOrFail($id);
        $slider->delete();

        
        // flash()
        // ->options([
        //     'timeout' => 2000, // 2 seconds
        //     'position' => 'top-right',
        // ])
        // ->addError('Your slider has been Deleted.');
        // return redirect()->route('home_slider');

    }

}
