<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Hash;
use App\User;

class RegisteredController extends Controller
{
    public function index(){
        /*$users = User::all();
        return view('admin.users.index')->with('users',$users);*/
         $users = User::where('status','!=','3')->paginate(5);
        return view('admin.users.index')->with('users',$users);
    }


    public function editrole($id){
        $user_roles = User::find($id);

        return view('admin.users.edit')->with('user_roles',$user_roles);
    }

    public function updaterole(Request $request, $id){
        $user = User::find($id);
        //dd($user);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_as = $request->input('roles_as');
        $user->update();

        return redirect('registered-user')->with('status','Role is Updated');

    }

    public function delete($id){

        $user = User::findorfail($id);
        $user->status='3';
        $user->update();
         return redirect('/registered-user')->with('status', 'User Deleted Successfully');

        /*$user = User::findOrFail($id);
        dd($user);  


        $user->status='3';
        $user->update(); 

       $image_path = base_path()."/public/uploads/profile_image/".$user->photo;
      
        if(file_exists($image_path)){
            File::delete($image_path);
        } 
      
        $user->delete();
       return back()->with('status','User is Deleted Successfully');
       return redirect('registered-user')->with('status','Deleted Successfully');*/

    }

    public function delete_records(){
        $users = User::where('status','3')->get();
        return view('admin.users.delete')
                ->with('users',$users);
    }


     public function delete_restore($id){
        $user = User::findorfail($id);
        $user->status = "0"; //0->show, "1"->hide, "2"->delete;
        $user->update();
        return redirect('/registered-user')->with('status',"User Data Re Stored Successfully");
    }

  

    public function restore_all()
    {
        $users_id = User::where('status','3')->get();
//dd(count($users_id));
        if(count($users_id)>0){
        foreach ($users_id as $data){
                $data->status = 0;
                $data->update();
            }
         return redirect('/registered-user')->with('status',"All Records Restored successfully");
        }if(count($users_id)==0){
           return back()->with('status', 'No Records Found'); 
        }
        
        //$users->status = "0"; //0->show, "1"->hide, "2"->delete;
        //$users->update();
        //return back()->with('status', 'All Records Restored successfully');
        
    }

     public function manager_profile(){
        return view('admin.users.manager_profile');
    }

     public function manager_profile_update(Request $request){
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

    public function manager_change_Password(){
        return view('admin.users.manager_change_password');
    }

    public function manager_change_password_update(Request $request){

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
