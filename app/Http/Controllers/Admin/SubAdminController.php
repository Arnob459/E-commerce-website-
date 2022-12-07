<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;

class SubAdminController extends Controller
{
    //
    public function AllSubAdmins(){
        $subadmins = User::latest()->get();

        return view('admin.allsubadmins', compact('subadmins'));
    }


    public function AddSubAdmin(){
        return view('admin.addsubadmin');
    }

    public function StoreSubAdmin(Request $request){
        $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|max:30',
            'password' => 'required|min:8|max:30',

         ]);

         User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
         ]);
         return redirect()->route('allsubadmins')->with('message','SubAdmin Added Successfully!');
    }

    public function EditSubadmin($id){
        $subadmininfo = User::findOrFail($id);
        return view('admin.editsubadmin', compact('subadmininfo'));

    }

    public function UpdateSubadmin(Request $request){
        $subadminid = $request->id;
        $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|max:30',
            'password' => 'required|min:8|max:30',

         ]);

         User::findOrFail($subadminid)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,

         ]);
         return redirect()->route('allsubadmins')->with('message','SubAdmin updated Successfully!');

        
    }

    public function DeleteSubadmin($id){
        User::findOrFail($id)->delete();

        return redirect()->route('allsubadmins')->with('message','Subadmin Deleted Successfully!');
        
    }

}
