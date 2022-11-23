@extends('layouts.admin')
@section('title')
Dashboard
@endsection
@section('content')
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">           
            <span>Employee's - Edit Leave</span>
          </h4>         

        </div>

      </div>
      <!-- Heading -->

        <div class="row">
          <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                     <form action="{{url('leave-update/'.$employee_leaves->id)}}" method="post">
                    {{csrf_field()}}
                    @method('PUT')
                     @if (session('status'))
                  <div class="alert alert-success" role="alert">
                     {{ session('status') }}
                  </div>
                  @endif
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      &nbsp;
                    </div>
                    <div class="form-group col-md-5">
                  <h4 class="btn btn-info">Current Leave Status : {{$employee_leaves->leave_status}}</h4>
                </div>
                 <div class="form-group col-md-3">
                      &nbsp;
                    </div>
                  </div>
                  <div class="form-row">
                                    <div class="form-group col-md-2">
                                       <label for="employee_name">Name</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                       <input type="text" name="employee_name" class="form-control" value="{{$employee_leaves->employee_name}}" readonly>
                                    </div>
                                 </div>

                                  <div class="form-row">
                                    <div class="form-group col-md-2">
                                       <label for="leave_type">Leave Type</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="text" name="leave_type" class="form-control" value="{{$employee_leaves->leave_type}}" readonly>
                                    </div>
                                 </div>

                      <div class="form-row">
                                    <div class="form-group col-md-2">
                                       <label for="from_date">From Date</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="text" name="from_date" class="form-control" value="{{$employee_leaves->from_date}}" readonly>
                                    </div>
                                 </div>

                      <div class="form-row">
                                    <div class="form-group col-md-2">
                                       <label for="to_date">To Date</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="text" name="to_date" class="form-control" value="{{$employee_leaves->to_date}}" readonly>
                                    </div>
                                 </div>

                    <div class="form-row">
                                    <div class="form-group col-md-2">
                                       <label for="no_of_days">No Of Days</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="text" name="no_of_days" class="form-control" value="{{$employee_leaves->no_of_days}}" readonly>
                                    </div>
                                 </div>
                      <div class="form-row">
                                    <div class="form-group col-md-2">
                                       <label for="leave_status">Status</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <select name="leave_status" class="form-control">
                        

                           <option >Select Status</option>
                           <option {{ ($employee_leaves->leave_status) == 'waiting for apporval' ? 'selected' : '' }} value="waiting for apporval">waiting for apporval</option>
                           <option {{ ($employee_leaves->leave_status) == 'approve' ? 'selected' : '' }} value="approve" >approve</option>
                            <option {{ ($employee_leaves->leave_status) == 'cancel' ? 'selected' : '' }} value="cancel" >cancel</option>
                         </select>
                                    </div>
                                 </div>
                      
                       
                    
                      <div class="form-group">
                        <button type="submit" class="btn btn-warning">Update</button>
                      </div>
                </form>
                </div>                
              </div>
          </div>
                  
      </div>
        
      

    </div>
@endsection