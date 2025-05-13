<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function create_testimonial(){
        return view('create_testimonial');
    }
    public function ourfilestore_testimonial(REQUEST $request){

        $validated = $request->validate([
            'name' => 'required',
            'company_name' => 'nullable',
            'position' => 'required',
            'message' => 'required',
            'photo' => 'required|mimes:png,jpg,bmp,tiff,pdf',
            'create_by' => 'nullable',
        ]);

        //Upload photo
        $photoName = null;
        if(isset($request->photo)){
            
            $photoName = time().'.'.$request->photo->extension();
            $request->photo-> move(public_path('photos'),$photoName);
        }
        


        //Add new photo
        $testimonial = new Testimonial;

        $testimonial->name = $request->name;
        $testimonial->company_name = $request->company_name;
        $testimonial->position = $request->position;
        $testimonial->message = $request->message;
        $testimonial->photo = $photoName;
        $testimonial->create_by = $request->create_by;
        
        $testimonial->save();
        
        return redirect()->route('home_testimonial')->with('success','Your testimonial has been created');
    }

    public function editData_testimonial($id){

        $testimonial = Testimonial::findOrFail($id);
        return view('edit_testimonial',['our_edit_testimonial' => $testimonial]);
    }

    public function updateData_testimonial($id, Request $request){
        
        $validated = $request->validate([
            'name' => 'required',
            'company_name' => 'nullable',
            'position' => 'required',
            'message' => 'required',
            'photo' => 'required|mimes:png,jpg,bmp,tiff,pdf',
            'create_by' => 'nullable',
        ]);

        //Update Data
        $testimonial = Testimonial::findOrFail($id);
        
        $testimonial->name = $request->name;
        $testimonial->company_name = $request->company_name;
        $testimonial->position = $request->position;
        $testimonial->message = $request->message;
        $testimonial->create_by = $request->create_by;

        //Update photo
        if(isset($request->photo)){
            
            $photoName = time().'.'.$request->photo->extension();
            $request->photo-> move(public_path('photos'),$photoName);
            $testimonial->photo = $photoName;
        }
        
        
        $testimonial->save();
        
        return redirect()->route('home_testimonial')->with('success','Your testimonial has been Upated');
    
        

    }

    public function deleteData_testimonial($id){

        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        
        // flash()
        // ->options([
        //     'timeout' => 2000, // 2 seconds
        //     'position' => 'top-right',
        // ])
        // ->addError('Your testimonial has been Deleted.');
        return redirect()->route('home_testimonial');

    }
}
