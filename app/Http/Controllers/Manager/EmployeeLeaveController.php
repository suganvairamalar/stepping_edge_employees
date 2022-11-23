<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Validator,Redirect,Response;
use View;
use Session;
use App\EmployeeDetailLeave;
use Carbon\Carbon;

class EmployeeLeaveController extends Controller
{
    public function index(Request $request){

        $employee_leaves = EmployeeDetailLeave::orderBy('id','asc')->paginate(5);

       return view('admin.leaves.index')->with('employee_leaves',$employee_leaves);

    }


    public function search_filter(Request $request){
         if($request->search==""){
            $employee_leaves = EmployeeDetailLeave::orderBy('id','asc')->paginate(5);

             return view('admin.leaves.index')->with('employee_leaves',$employee_leaves);
         }
         else{

            $employee_leaves = EmployeeDetailLeave::orderBy('id','asc');                         
            if($request->get('search_dropdown')=='employee_name'){
                $employee_leaves->where('employee_name','LIKE','%'.$request->get('search').'%');
                } 
            if($request->get('search_dropdown')=='leave_type'){
                $employee_leaves->where('leave_type','LIKE','%'.$request->get('search').'%');
                }
            if($request->get('search_dropdown')=='leave_status'){
                $employee_leaves->where('leave_status','LIKE','%'.$request->get('search').'%');
                }
                      
                          
             $employee_leaves=$employee_leaves->paginate(5);
             $employee_leaves->appends($request->only('search'));
             return view('admin.leaves.index')->with('employee_leaves',$employee_leaves);
            
         }

    }


    public function editleave($id){
        $employee_leaves = EmployeeDetailLeave::find($id);

        return view('admin.leaves.edit')->with('employee_leaves',$employee_leaves);
    }

    public function updateleave(Request $request, $id){
        $employee_leaves = EmployeeDetailLeave::find($id);
        //dd($user);
        $employee_leaves->leave_status = $request->input('leave_status');
        $employee_leaves->update();

        return redirect('employee-leave')->with('status','Leave Status is Updated');

    }
}
