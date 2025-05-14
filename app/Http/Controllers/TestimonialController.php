<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function create_testimonial(){
        $users = User::all(); // To fetch all data of User Model
        return view('create_testimonial', compact('users'));
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

        //Add photos to the database
        $photoName = null;
        if(isset($request->photo)){
            
            $photoName = time().'.'.$request->photo->extension();
            $request->photo-> move(public_path('photos'),$photoName);
        }
        


        //Add testimonial to the database
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
        $users = User::all();
        return view('edit_testimonial',['our_edit_testimonial' => $testimonial, 'users' => $users ]); //here 'users' => $users to fetch all data from User Model
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

        //Update data of database
        $testimonial = Testimonial::findOrFail($id);
        
        $testimonial->name = $request->name;
        $testimonial->company_name = $request->company_name;
        $testimonial->position = $request->position;
        $testimonial->message = $request->message;
        $testimonial->create_by = $request->create_by;

        //Update photo of database
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

        return redirect()->route('home_testimonial');
    }
}
