@extends('layouts.app')

@section('stylesheets')
   
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="//cdn.ckeditor.com/4.5.9/full/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script>  
        
         $(document).ready(function() {

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });
    </script> 
@endsection
@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Add New users </h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                  <li class="breadcrumb-item "><a href="{{url('/home')}}">Home</a></li>
                                <li class="breadcrumb-item active"><a class="breadcrumb-item active" href="{{url('/home')}}">Add New USsers</a></li>
                              
                            </ol>
                            <button  type="button" class="btn btn-info d-none d-lg-block m-l-15" onclick="window.location='{{ route("user.list") }}'"><i class="fa fa-list"></i> users List </button>
                        </div>
    </div>
</div>

<!-- form -->
<div class="row">
    <div class="col-sm-12">
        <div class="card card-body">
         @if ($errors->any())
         @foreach ($errors->all() as $error)
         <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <li>{{ $error }}</li>
        </div>


        @endforeach
        @endif              
        <form class="form-horizontal m-t-40" action="{{ route('user.store')}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}

          
    <!-- over select -->
    <!-- row2 -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>First Name<span class="text-danger">*</span></label>
                <input type="text" name="first_name" class="form-control" placeholder="Enter  Name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Last Name<span class="text-danger">*</span></label>
                <input type="text" name="last_name" class="form-control" placeholder="Enter  Name">
            </div>
        </div>
        
        </div>
        <!--/row-->
         <!-- row2 -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Password
<span class="text-danger">*</span></label>
                <input type="Password" name="password" class="form-control" placeholder="Password">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Confirm Password<span class="text-danger">*</span></label>
                <input type="Password" name="confirm-password" class="form-control" placeholder="Confirm Password">
            </div>
        </div>
        
        </div>
        <!--/row-->

       
 <!-- row2 -->
        <div class="row">
             <div class="col-md-6">
            <div class="form-group">
                <label>Email<span class="text-danger">*</span></label>
                <div class="input-group">
                    <input type="text" class="form-control" name="email" id="users_price" placeholder="Enter  Email Address">
                    <div class="input-group-append"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
                </div></div>
            </div>
             <div class="col-md-6">
            <div class="form-group">
                <label>Phone No<span class="text-danger">*</span></label>
                <div class="input-group">
                    <input type="text" class="form-control" name="phone_no" id="users_price" placeholder="Enter Phone Number">
                    <div class="input-group-append"><span class="input-group-text"><i class="fa fa-phone    "></i></span></div>
                </div></div>
            </div>
 </div>
 <!--/row-->
  <div class="row">
 <div class="col-lg-12" >
<div class="form-group">
        <label>Profile Picture<span class="text-danger">*</span></label>
       
        <input type="file" id="input-file-now-custom-1" name="user_img" class="dropify" />
        
       
</div>
    </div>
      </div>
 <!-- over row2 -->





<div class="form-group m-b-0">
    <div class="offset-sm- col-sm-12">
        <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">Submit</button>
        <button type="reset" class="btn btn-inverse waves-effect waves-light m-t-10">Cancel</button>
    </div>
</div>
</form>
</div>
</div>
</div>
<!-- form over -->

@endsection
 @section('script')
  
 @endsection