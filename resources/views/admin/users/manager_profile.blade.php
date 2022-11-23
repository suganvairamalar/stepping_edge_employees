@extends('layouts.frontend')
@section('title')
My Profile
@endsection

@section('content')


<section style="padding: 84px;">
	 <div class="container">
		  <div class="row">
			     <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                 @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <h4>My Profile Page</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                           
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <a href="{{url('registered-user')}}" class="btn btn-info float-right mt-10">back to home</a>
                        </div>
                    </div>
                </div>
              
                 <hr>
                 <form action="{{url('manager_profile_update')}}" method="POST" enctype="multipart/form-data">
                  {{csrf_field()}}
                   <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" name="lname" value="{{ Auth::user()->lname }}" autocomplete="off" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Email Id </label>
                            <input type="text" readonly class="form-control" name="email" value="{{ Auth::user()->email }}" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Address 1 (FlatNo, Apt No & Address)</label>
                            <input type="text" class="form-control" name="address1" value="{{ Auth::user()->address1 }}" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Address 2 (LandMark, Near By)</label>
                            <input type="text" class="form-control" name="address2" value="{{ Auth::user()->address2 }}" autocomplete="off">
                        </div>
                    </div>
                         <div class="col-md-4">
                        <div class="form-group">
                            <label for="">City</label>
                            <input type="text" class="form-control" name="city" value="{{ Auth::user()->city }}" autocomplete="off">
                        </div>
                    </div>
                         <div class="col-md-4">
                        <div class="form-group">
                            <label for="">State</label>
                            <input type="text" class="form-control" name="state" value="{{ Auth::user()->state }}" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Pincode / Zipcode</label>
                            <input type="text" class="form-control" name="pincode" value="{{ Auth::user()->pincode }}" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Alternate Phone Number</label>
                            <input type="text" class="form-control" name="alternate_phone" value="{{ Auth::user()->alternate_phone }}" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <button type="submit" class="mt-4 btn btn-warning">Update Profile</button>                            
                        </div>
                    </div>
                    <div class="col-md-4">
                      @if(Auth::user()->profile_image=='')
<img class="image rounded-circle w-75" src="{{asset('/storage/images/profile_image.png')}}" alt="profile_image" style="padding: 10px; margin: 0px; ">
@endif
                      <input type="file" name="profile_image" class="form_control"><br>
                        <img src="{{asset('uploads/profile/'. Auth::user()->profile_image)}}" class="image rounded-circle w-75" alt="">
                        </div>
                    </div>
                 </form>
                 </div>
              </div>
            </div>
           </div>

		  </div><!--end row-->		
	</div><!--end container-->
	
</section>
@endsection


