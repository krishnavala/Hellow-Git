@extends('layouts.app')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Profile Setting</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{url('/home')}}">Home</a></li>
                <li class="breadcrumb-item active">Profile Setting</a></li>

            </ol>

        </div>
    </div>
</div>

<!-- Row -->
<div class="row">
    <!-- Column -->

    <!-- Column -->
    <div class="col-lg-12 col-xlg-9 col-md-7">
        <div class="card">

            <!-- frofilee -->
            <ul class="nav nav-tabs profile-tab" role="tablist">
                
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="settings" role="tabpanel">
                    <div class="card-body">
                       <div class="card-body">
                        @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                            <li>{{ $error }}</li>
                        </div>


                        @endforeach
                        @endif

                        @if(Session::has('success_msg'))
                        <div class="alert alert-success">
                            <button class="close" data-dismiss="alert">
                                <i class="ace-icon fa fa-times"></i>
                            </button>
                            <i class="ace-icon fa fa-hand-o-right"></i>
                            {{ Session::get('success_msg') }}
                        </div>
                        @endif
                        <form class="form-horizontal form-material" method="post" action="{{route('users.update', $user)}}">
    {{ csrf_field() }}
    {{ method_field('patch') }}

                            


                            <div class="form-group">



                                <label class="col-md-12">Full Name</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Enter Name" class="form-control form-control-line"  name="name"  value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="email"  value="{{ $user->email }}" id="example-email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Password</label>
                                <div class="col-md-12">
                                    <input type="password" placeholder="Password" class="form-control form-control-line" name="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Confirm Password</label>
                                <div class="col-md-12">
                                    <input type="password" placeholder="Confirm Password" class="form-control form-control-line" name="confirm-password">
                                </div>
                            </div>

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
        </div>
    </div>

    <!-- Column -->
</div>
<!-- Row -->

@endsection
