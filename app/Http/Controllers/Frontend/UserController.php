<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Hash;
use App\User;


class UserController extends Controller
{
    public function employee_profile(){
        return view('frontend.user.employee_profile');
    }

     public function employee_profile_update(Request $request){
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        $user->name = $request->input('name');
        $user->lname = $request->input('lname');
        $user->address1 = $request->input('address1');
        $user->address2 = $request->input('address2');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->pincode = $request->input('pincode');
        $user->phone = $request->input('phone');
        $user->alternate_phone = $request->input('alternate_phone');
        
        //$user->profile_image = $request->input('profile_image');
        
        if($request->hasfile('profile_image')){
            $destination = 'uploads/profile/'.$user->profile_image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();//use to name
            $filename = time().".".$extension; //use to avoid repeat name
            $file->move('uploads/profile/',$filename);
            $user->profile_image = $filename;
        }
        

        $user->update();
        return redirect()->back()->with('status','Profile Updated');

    }

    public function changePassword(){
        return view('frontend.user.changepassword');
    }

    public function changePasswordupdate(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("status","Password changed successfully !");

    }


}
