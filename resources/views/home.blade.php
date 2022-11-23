@extends('layouts.frontend')
@section('title')
Register
@endsection

@section('content')
<section style="padding: 84px;">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
<div class="row">
      <div class="pull-left">
         <!-- a trigger modal -->
<a href="" class="nav-link badge badge-pill px-5 py-3 btn-primary" data-toggle="modal" data-target="#exampleModal">
    Apply Leave
</a>
      </div>
      <div class="pull-right">
         
      </div>
   </div>


</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                   

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Leave Application Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="employee_name">Name</label>
       </div>
       <div class="form-group col-md-8">
      <input type="text" class="form-control" id="employee_name" name="employee_name" placeholder="employee name">
    </div>
</div>
   <div class="form-row"> 
    <div class="form-group col-md-4">
      <label for="emp_id">Id</label>
  </div>
      <div class="form-group col-md-8" >
      <input type="text" class="form-control" id="emp_id" name="emp_id" placeholder="employee id">
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
      <input type="text" class="form-control datepicker from_date" placeholder="DD-MM-YYYY" style="width:100%;line-height: 65px;" id="from_date" placeholder="From Date">
    </div>
</div>

    <div class="form-row">
    <div class="form-group col-md-4">
      <label for="to_date">To Date</label>
     </div>

      <div class="form-group col-md-6">
      <input type="text" class="form-control datepicker to_date" placeholder="DD-MM-YYYY" style="width:100%;line-height: 65px;" id="to_date" placeholder="To Date">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">No of Days</label>
    </div>
    <div class="form-group col-md-4" >     
      <input type="text" class="form-control" id="no_of_days" name="no_of_days" placeholder="No Of Day(s)">
    </div>
  </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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
</section>
@endsection
