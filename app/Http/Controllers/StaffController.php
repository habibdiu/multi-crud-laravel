<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function create_staff(){
        $users = User::all(); // fetch all users
        return view('create_staff', compact('users')); // through compact, pass users to view
    }
    public function ourfilestore_staff(REQUEST $request){

        $validated = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'photo' => 'required|mimes:png,jpg,bmp,tiff,pdf',
            'phone' => 'nullable',
            'facebook' => 'nullable',
            'linkedin' => 'nullable',
            'twitter' => 'nullable',
            'priority' => 'nullable',
            'created_by' => 'required|exists:users,id',
        ]);

        //Upload photo
        $photoName = null;
        if(isset($request->photo)){
            
            $photoName = time().'.'.$request->photo->extension();
            $request->photo-> move(public_path('photos'),$photoName);
        }
        


        //Add new photo
        $staff = new Staff;

        $staff->name = $request->name;
        $staff->position = $request->position;
        $staff->photo = $photoName;
        $staff->phone = $request->phone;
        $staff->facebook = $request->facebook;
        $staff->linkedin = $request->linkedin;
        $staff->twitter = $request->twitter;
        $staff->priority = $request->priority;
        $staff->created_by = $request->created_by;
        
        $staff->save();
        
        return redirect()->route('home_staff')->with('success','Your staff has been created');
    }

    public function editData_staff($id){

        $staff = Staff::findOrFail($id);
        $users = User::all();
        return view('edit_staff', ['our_edit_staff' => $staff, 'users' => $users]);

    }

    public function updateData_staff($id, Request $request){
        
        $validated = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'photo' => 'required|mimes:png,jpg,bmp,tiff,pdf',
            'phone' => 'nullable',
            'facebook' => 'nullable',
            'linkedin' => 'nullable',
            'twitter' => 'nullable',
            'priority' => 'nullable',
            'created_by' => 'required|exists:users,id',
        ]);

        //Update Data
        $staff = Staff::findOrFail($id);
        
        $staff->name = $request->name;
        $staff->position = $request->position;
        $staff->phone = $request->phone;
        $staff->facebook = $request->facebook;
        $staff->linkedin = $request->linkedin;
        $staff->twitter = $request->twitter;
        $staff->priority = $request->priority;
        $staff->created_by = $request->created_by;

        //Update photo
        if(isset($request->photo)){
            
            $photoName = time().'.'.$request->photo->extension();
            $request->photo-> move(public_path('photos'),$photoName);
            $staff->photo = $photoName;
        }
        
        
        $staff->save();
        
        return redirect()->route('home_staff')->with('success','Your staff has been Upated');
    
        

    }

    public function deleteData_staff($id){

        $staff = Staff::findOrFail($id);
        $staff->delete();

        
        // flash()
        // ->options([
        //     'timeout' => 2000, // 2 seconds
        //     'position' => 'top-right',
        // ])
        // ->addError('Your staff has been Deleted.');
        return redirect()->route('home_staff');

    }
}
