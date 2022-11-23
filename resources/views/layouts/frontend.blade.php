<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title') | Stepping Edge</title> 
    <meta name="description" content="@yield('meta_description')">  
    <meta name="keywords" content="@yield('meta_keyword')">  
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/css/all.css')}}">      
    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
   
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/css/mdb.min.css')}}">  

    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    




    
  </head>
  <body>
    <!-- Start your project here-->
    @include('layouts.inc.front-navbar')
   <main>
      @yield('content')
    </main>
    @include('layouts.inc.front-footer')
    <!-- End your project here-->
    
     <!-- scripts -->
    <!-- jQuery -->
    <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{asset('assets/js/popper.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{asset('assets/js/mdb.min.js')}}"></script>
    <!-- select2 dropdown JavaScript -->
    <script type="text/javascript" src="{{asset('assets/js/select2.min.js')}}"></script>

    <!-- select2 dropdown JavaScript -->
    <script type="text/javascript" src="{{asset('assets/js/employee_detail_leaves.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/moment.js"></script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> 
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 

        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"> 
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css"/>
        
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">        
        
  
       <script type="text/javascript">
     let x = "SE"+' '+Math.random().toString().substr(2, 6);

//document.getElementById("demo").innerHTML = x;
       //$("#employee_id").val= x;

       $('#employee_id').val(x);
       //alert($('#employee_id').val());
       //$('[name=employee_id]').val(x);
   
 


    </script>

    @yield('script')

  </body>
</html>
