@extends('layouts.frontend')
@section('title')
Leave Application Form
@endsection
@section('content')
<section style="padding: 84px;">
  <!--  <div class="container-fluid" style="margin-left:-90px;
  width: 115%;"> -->
  <div class="container" style="">
      <div class="row justify-content-center">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                  <div class="row">
                     <div class="pull-left">
                        <!-- a trigger modal -->
                        <button type="button" name="employee_detail_leaves_create_record" id="employee_detail_leaves_create_record" class="nav-link badge badge-pill px-5 py-3 btn-primary">Apply Leave</button>
                     </div>
                     <div class="pull-right" >
                         <!-- <h5 style="margin-left: 980px;margin-top: 10px;">You are logged in!</h5> -->
                         <h5 style="margin-left: 750px;margin-top: 10px;color: red;font-weight: bold;font-style: italic;">You are logged in!</h5>
                     </div>
                  </div>
               </div>

               <div class="card-body">

                  <div class="row">
      @include('employee_detail_leaves.employee_detail_leaves_list')   
   </div>
        <!-- Modal -->
                  <div id="employee_detail_leaves_form_Modal" class="modal fade" role="dialog">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header bg-warning">
                              <label class="modal-title">Leave Application Form</label>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="start_cloes"><span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <form method="post" id="employee_detail_leaves_form" class="form-horizontal">
                              <div class="modal-body bg-info">
                                 <span id="employee_detail_leaves_form_result"></span>
                                 {{ csrf_field() }}
                                 <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                 <div class="form-row">
                                    <div class="form-group col-md-4">
                                       <label for="employee_name">Name</label>
                                    </div>
                                    <div class="form-group col-md-8">
                                       <input type="text" class="form-control" id="employee_name" name="employee_name" placeholder="employee name" autocomplete="off" value="{{Auth::user()->name}}" readonly>
                                    </div>
                                 </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-4">
                                       <label for="emp_id">Id</label>
                                    </div>
                                    <div class="form-group col-md-8" >
                                       <input type="text" class="form-control" id="emp_id" name="emp_id" placeholder="employee id" autocomplete="off" value="{{Auth::user()->employee_id}}" readonly>
                                    </div>
                                 </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-4">
                                       <label for="leave_type">Leave Type</label>
                                    </div>
                                    <div class="form-group col-md-8" >
                                       <select id="leave_type" name="leave_type" class="form-control">
                                          <option selected>Choose...</option>
                                          <option value="CL">CL</option>
                                          <option value="SL">SL</option>
                                          <option value="PL">PL</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-4">
                                       <label for="from_date">From Date</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                       <input type="text" class="form-control datepicker from_date" name="from_date" placeholder="DD-MM-YYYY" style="width:100%;line-height: 65px;" id="from_date" placeholder="From Date" autocomplete="off">
                                    </div>
                                 </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-4">
                                       <label for="to_date">To Date</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                       <input type="text" class="form-control datepicker to_date" placeholder="DD-MM-YYYY" name="to_date" id="to_date" placeholder="To Date" autocomplete="off">
                                    </div>
                                 </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-4">
                                       <label for="inputEmail4">No of Days</label>
                                    </div>
                                    <div class="form-group col-md-4" >     
                                       <input type="text" class="form-control" id="no_of_days" name="no_of_days" placeholder="No Of Day(s)" autocomplete="off">
                                      <span class="error"></span>
                                    </div>
                                 </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-4">
                                       <label for="leave_status">Status</label>
                                    </div>
                                    <div class="form-group col-md-8" >
                                     <!--   <select id="leave_status" name="leave_status" class="form-control">
                                          <option value="waiting for apporval">waiting for apporval</option>
                                           <option value="approve">approve</option>
                           <option value="cancel" >cancel</option>
                                       </select> -->
                                       
                                       <input type="text" class="form-control" id="leave_status" name="leave_status"  autocomplete="off" value="{{Auth::user()->name}}" readonly >
                                       
                                    </div>
                                 </div>
                              </div>
                              <div class="modal-footer bg-warning">
                                 <input type="hidden" name="hidden_id" id="hidden_id" class="form-control">
                                 <input type="hidden" name="hidden_leave_type" id="hidden_leave_type" class="form-control">  
                                 @if($employee_detail_leaves)
                                 <input type="hidden" name="hidden_leave_status" id="hidden_leave_status" class="hidden_leave_status form-control" value="">  
                                 @endif 
                                 <input type="hidden" name="employee_detail_leaves_action" id="employee_detail_leaves_action" />                  
                                 <button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">CLOSE</button>
                                

                                 <input type="submit" name="employee_detail_leaves_action_button" id="employee_detail_leaves_action_button" class="btn btn-primary" value="ADD">
                                 
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>                          
                          
                  </div>
               </div>
            </div>
         </div>
      </div>


      <div class="row">
   <div id="employee_detail_leaves_confirm_Modal" class="modal fade" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header bg-danger">
               <label class="modal-title">CONFIRMATION</label>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <p style="color:red;font-size:16px;font-weight: bold;font-style: italic;">Are you sure !! want to delete this record?</p>
            </div>
            <div class="modal-footer bg-danger">
               <button type="button" name="employee_detail_leaves_ok_button" id="employee_detail_leaves_ok_button" class="btn btn-warning">OK</button>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
         </div>
      </div>
   </div>
</div>

</section>
@endsection