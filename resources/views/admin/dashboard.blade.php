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
            <a href="">Home Page</a>
            <span>/</span>
            <span>Dashboard</span>
          </h4>

          <form class="d-flex justify-content-center">
            <!-- Default input -->
            <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
            <button class="btn btn-primary btn-sm my-0 p" type="submit">
              <i class="fa fa-search"></i>
            </button>

          </form>

        </div>

      </div>
      <!-- Heading -->

        <div class="row">
          <div class="col-md-3">
              <div class="card">
                <div class="card-body">
                      <h5>Total Orders : 9 </h5>
                </div>                
              </div>
          </div>
          <div class="col-md-3">
              <div class="card">
                <div class="card-body">
                      <h5>Total Orders : 5 </h5>
                </div>                
              </div>
          </div>        
      </div>
        
      

    </div>
@endsection