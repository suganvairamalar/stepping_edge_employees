@extends('layouts.frontend')
@section('title')
Change Password
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
                             @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif


                            
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <h4>Password Update Page</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                           
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <a href="{{url('home')}}" class="btn btn-info float-right mt-10">back to home</a>
                        </div>
                    </div>
                </div>
                
                <hr>
                <form action="{{route('changePasswordupdate')}}" method="POST">
                    {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">Current Password</label>
                             <input id="current-password" type="password" class="form-control" name="current-password" required>

                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    </div><!--end row-->
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">New Password</label>

                               <input id="new-password" type="password" class="form-control" name="new-password" required>

                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                </div><!--end row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="new-password-confirm" class="col-md-6 control-label">Confirm New Password</label>

                               <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>    
                        </div>
                    </div>
                </div><!--end row-->

                <div class="row">
                     <div class="form-group">
                            <div class="col-md-12 col-md-offset-6">
                                <button type="submit" class="btn btn-warning">
                                    Change Password
                                </button>
                            </div>
                        </div>
                </div>                    
                </form>
            </div><!--end container-->
        </div><!--end card-->
    </div><!--end card body-->
</div><!--end row-->
</div>
</section>
@endsection