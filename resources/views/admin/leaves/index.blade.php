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
            <span>Employee's Leave Details</span>
          </h4>      


        </div>

      </div>
      <!-- Heading -->

        <div class="row">
          <div class="col-md-12">
            <form action="{{url('search_filter')}}" method="get">
              {{ csrf_field() }}
               {{ method_field('GET') }}
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <div class="row">
                  <div class="col-md-2">
                      <div class="form-group">
                        <h4><span> search</span></h4>
                      </div>      
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                         <select class="form-control" name="search_dropdown" id="search_dropdown">
                          <option value="">Select Search</option>
                          <option value="employee_name">Name</option>
                          <option value="leave_type">Leave Type</option>
                          <option value="leave_status">Leave Status</option>
                         
                        </select>
                      </div>      
                  </div> 
                   <div class="col-md-4">
                      <div class="form-group">
                        <input type="text" class="form-control" name="search" id="search">
                      </div>      
                  </div>         
              <div class="col-md-1">
                <button type="submit" class="badge badge-pill btn-primary px-3 py-2 mt-0" id="user_search_submit" name="user_search_submit">Filter</button>
              </div>
              <div class="col-md-1">
                <!-- <a href="{{url('search_filter')}}" class="badge badge-pill btn-secondary px-3 py-2 mt-0">Refresh</a> -->
                <button type="button" class="badge badge-pill btn-secondary px-3 py-2" id="user_btn_refresh" name="user_btn_refresh">Refresh</button>
              </div>
            </div>
          </form>
        </div>

          <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                   @if (session('status'))
                  <div class="alert alert-success" role="alert">
                     {{ session('status') }}
                  </div>
                  @endif
                  <h6 class="mb-0">
          <!--  <a href="" class="badge bg-primary p-2 text-white float-right ml-2">Deleted Records</a> -->
         </h6>  

                     <table class="table table-bordered">
                      <thead>
                       <tr>
                         <th>S.NO</th>
                         <th>Name</th>
                         <th>leave_type</th>
                         <th>from_date</th>
                         <th>to_date</th>
                         <th>no_of_days</th>
                         <th>Leave Status</th>     
                         <th>Action</th>
                       </tr>
                       </thead>
                       <tbody>
                        <?php $i=0; ?>
                         @foreach($employee_leaves as $item)
                          <?php $i++; ?>
                         <tr>
                           <td>{{ $i }}</td>
                           <td>{{ $item->employee_name }}</td>
                           <td>{{ $item->leave_type }}</td>
                           <td>{{ $item->from_date }}</td>
                           <td>{{ $item->to_date }}</td>
                           <td>{{ $item->no_of_days }}</td>
                           <td>{{ $item->leave_status }}</td>
                           <td>
                             <a href="{{url('leave-edit/'.$item->id)}}" class="badge badge-pill btn-warning px-3 py-2">EDIT </a>
                             <a href="" id="{{ $item->id }}" class="badge badge-pill btn-danger px-3 py-2" onclick="return confirm('sure want to delete?')">DELETE</a>
                           </td>
                         </tr>
                         @endforeach
                       </tbody>
                     </table>
                </div>                
              </div>
          </div>
                  
      </div>
        
      <div class="float-right">{{$employee_leaves->links()}}</div> 

    </div>
@endsection