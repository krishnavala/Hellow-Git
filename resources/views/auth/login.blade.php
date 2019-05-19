@extends('layouts.main')

@section('content')
<section id="wrapper">
 <section id="wrapper">
    <div class="login-register" style="background-image:url(./assets/images/background/login-register.jpg);">
        <div class="login-box card">
            <div class="card-body">   

                <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h3 class="text-center m-b-20">Sign In</h3>
                    @if(Session::has('success_msg'))
              <div class="alert alert-success">
                <button class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>
                <i class="ace-icon fa fa-hand-o-right"></i>
                {{ Session::get('success_msg') }}
            </div>
            @endif
                    <div class="form-group ">
                        <div class="col-xs-12">
                            
                            <input id="email" placeholder="Email Address" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                         <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                         @if ($errors->has('password'))
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div class="custom-control custom-checkbox">
                                 <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                 <label class="custom-control-label" for="customCheck1">Remember me</label>
                             </div> 
                        <!-- <div class="ml-auto">
                             @if (Route::has('password.request'))
                            <a  href="" id="to-recover" class="text-muted"><i class="fas fa-lock m-r-5"></i> Forgot pwd?</a> 
                             @endif
                         </div> -->
                     </div>
                 </div>
             </div>
             <div class="form-group text-center">
                <div class="col-xs-12 p-b-20">
                    <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Log In</button>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                    <div class="social">
                        <button class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fab fa-facebook-f"></i> </button>
                        <button class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fab fa-google-plus-g"></i> </button>
                    </div>
                </div>
            </div>
            <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                    Don't have an account? 

                    
                    @if (Route::has('register'))
                    
                    <a class="text-info m-l-5" href="{{ route('register') }}"><b>Sign Up</b></a>
                </li>
                @endif
            </div>
        </div>
        
    </form>
    <form class="form-horizontal" id="recoverform" action="index.html">
        <div class="form-group ">
            <div class="col-xs-12">
                <h3>Recover Password</h3>
                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
            </div>
        </div>
        <div class="form-group ">
            <div class="col-xs-12">
                <input class="form-control" type="text" required="" placeholder="Email"> </div>
            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</section>
@endsection
