@extends('layouts.main')

@section('content')
  <section id="wrapper" class="step-register">
        <div class="register-box">
            <div class="">
               
                <!-- multistep form -->
                <form method="POST" action="{{ route('user.register') }}" id="msform" enctype="multipart/form-data" >
                    @csrf

                    <!-- progressbar -->
                    <ul id="eliteregister" style="margin-left: 200px;">
                        <li class="active">Account Setup</li>
                        <li>Personal Details</li>
                    </ul>
     
                    <!-- fieldsets -->
                    <fieldset>
                        <h2 class="fs-title">Create your account</h2>
                        @if ($errors->any())
         @foreach ($errors->all() as $error)
         <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <li>{{ $error }}</li>
        </div>


        @endforeach
        @endif 
                        <input type="text" name="email" maxlength="30" placeholder="Email" />
                         <input type="password" maxlength="30" name="password" placeholder="Password" />
                        <input type="password" maxlength="30" name="confirm-password" placeholder="Confirm Password" />
                        <input type="button" name="next"  class="next action-button" value="Next" />
                    </fieldset>
                    
                    <fieldset>
                        <h2 class="fs-title">Personal Details</h2>
                        
                        <input type="text"  name="first_name" maxlength="30" placeholder="First Name" />
                        <input type="text" name="last_name" maxlength="30" placeholder="Last Name" />
                        <input type="Number" name="phone_no" maxlength="10" placeholder="Phone" />
                         <input type="file" name="user_img"  id="input-file-now" class="dropify" />
        
                        <div class="form-group m-b-0">
        <div class="col-sm-12 text-center">
            Already have an account? 

            <a href="{{ route('login') }}" class="text-info m-l-5"><b>Sign In</b></a>
            
        </div>
    </div>
                        <input type="button" name="previous" class="previous action-button" value="Previous" />
                        <!-- <input type="button" name="submit" class="submit action-button" value="Submit" /> -->
                        <button class=" action-button" type="submit">Sign Up</button>
                    </fieldset>

                </form>
                <div class="clear"></div>
            </div>
        </div>
    </section>
@endsection
