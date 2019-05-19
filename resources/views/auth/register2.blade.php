@extends('layouts.main')

@section('content')
<form class="form-horizontal form-material" id="loginform"  method="POST" action="{{ route('register') }}">
                        @csrf
    <h3 class="text-center m-b-20">Sign Up</h3>
    <div class="form-group">
        <div class="col-xs-12">
                <input id="name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12">
                <input id="name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
        </div>
    </div>
    <div class="form-group ">
        <div class="col-xs-12">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
        </div>
    </div>
    <div class="form-group ">
        <div class="col-xs-12">
           <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required >
            
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12">
                <input id="phone_no" type="text" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" placeholder="Phone No" value="{{ old('phone_no') }}" required autofocus>

                                @if ($errors->has('phone_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_no') }}</strong>
                                    </span>
                                @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12">
               <input type="file" id="input-file-now" class="dropify" />
        
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">I agree to all <a href="javascript:void(0)">Terms</a></label> 
            </div> 
        </div>
    </div>
    <div class="form-group text-center p-b-20">
        <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
        </div>
    </div>
    <div class="form-group m-b-0">
        <div class="col-sm-12 text-center">
            Already have an account? 

            <a href="{{ route('login') }}" class="text-info m-l-5"><b>Sign In</b></a>
            
        </div>
    </div>
</form>
@endsection
