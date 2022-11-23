<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Validator,Redirect,Response;
use View;
use Session;
use App\EmployeeDetailLeave;
use Carbon\Carbon;


class EmployeeDetailLeaveController extends Controller
{
    public function index(Request $request){
        
        $authid = Auth::user()->employee_id;
        //dd($authid);

        //$employee_detail_leaves = EmployeeDetailLeave::where('emp_id','=',$authid)

        $employee_detail_leaves = EmployeeDetailLeave::where('emp_id','=',$authid)
        ->orderBy('id', 'DESC')
        ->paginate(5);

        // $employee_detail_leaves = EmployeeDetailLeave::where('emp_id','=',$authid)->get();
             
        return view('employee_detail_leaves.employee_detail_leaves_index',compact('employee_detail_leaves'));  
       
    }    
    public function insert(Request $request){

        $rules =     array('employee_name'   => 'required',
                           'emp_id'          => 'required',
                           'leave_type'      => 'required',
                           'from_date'       => 'required',
                           'to_date'         => 'required',
                           'no_of_days'      => 'required'
                             );
            $error = Validator::make($request->all(),$rules);

            if($error->fails()){
                return response()->json(['errors' => $error->errors()->all()]);
            }

            $form_data = array(
                'employee_name'  => Auth::user()->name,
                'emp_id'         => $request->emp_id,
                'leave_type'     => $request->leave_type,
                'from_date'      => date('Y-m-d', strtotime($request->from_date)),
                'to_date'        => date('Y-m-d', strtotime($request->to_date)),
                'no_of_days'     => $request->no_of_days,
                'leave_status'     => $request->leave_status,
                          
                               );
            EmployeeDetailLeave::create($form_data);
            return response()->json(['success' => 'Data Inserted Successfully.']);

    }

    public function edit($id){
        if(request()->ajax()){
            $data = EmployeeDetailLeave::findOrFail($id);
            return response()->json(['data' => $data]);
        }

    }

    public function view($id){
        if(request()->ajax()){
            $data = EmployeeDetailLeave::findOrFail($id);
            return response()->json(['data' => $data]);
        }

    }

    public function update(Request $request){

        $rules =     array('employee_name'   => 'required',
                           'emp_id'          => 'required',
                           'leave_type'      => 'required',
                           'from_date'       => 'required',
                           'to_date'         => 'required',
                           'no_of_days'      => 'required'
                             );
            $error = Validator::make($request->all(),$rules);

            if($error->fails()){
                return response()->json(['errors' => $error->errors()->all()]);
            }

            $form_data = array( 
                'employee_name' => Auth::user()->name,
                'emp_id'        => $request->emp_id,
                'from_date'     => date('Y-m-d', strtotime($request->from_date)),
                'to_date'       => date('Y-m-d', strtotime($request->to_date)),
                'leave_type'    => $request->leave_type,
                'no_of_days'    => $request->no_of_days,
                'leave_status'  => $request->leave_status,

                           );
        EmployeeDetailLeave::whereId($request->hidden_id)->update($form_data);
        return response()->json(['success' => 'Data Updated Successfully.']);

    }

    public function delete($id){
        $data = EmployeeDetailLeave::findOrFail($id);
        $data->delete(); 
    }

}
