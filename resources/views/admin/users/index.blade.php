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
            <span>Registered Users</span>
          </h4>   
               

        </div>

      </div>
      <!-- Heading -->

        <div class="row">
          <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                   @if (session('status'))
                  <div class="alert alert-success" role="alert">
                     {{ session('status') }}
                  </div>
                  @endif
                  <h6 class="mb-0">
           <a href="{{url('user_deleted_records')}}" class="badge bg-primary p-2 text-white float-right ml-2">Deleted Records</a>
         </h6>  

                     <table class="table table-bordered">
                      <thead>
                       <tr>
                         <th>Id</th>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Role</th>
                         <th>Action</th>
                       </tr>
                       </thead>
                       <tbody>
                         @foreach($users as $item)
                         <tr>
                           <td>{{ $item->id }}</td>
                           <td>{{ $item->name }}</td>
                           <td>{{ $item->email }}</td>
                           <td>{{ $item->role_as }}</td>
                           <td>
                             <a href="{{url('role-edit/'.$item->id)}}" class="badge badge-pill btn-warning px-3 py-2">EDIT ROLE</a>
                             <a href="{{url('user-delete/'.$item->id)}}" id="{{ $item->id }}" class="badge badge-pill btn-danger px-3 py-2" onclick="return confirm('sure want to delete?')">DELETE</a>
                           </td>
                         </tr>
                         @endforeach
                       </tbody>
                     </table>
                </div>                
              </div>
          </div>
                  
      </div>
        
      <div class="float-right">{{$users->links()}}</div> 

    </div>
@endsection