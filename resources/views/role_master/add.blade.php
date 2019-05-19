@extends('layouts.app')

@section('content')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Add New Role</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Add role</li>
            </ol>
             <button  type="button" class="btn btn-info d-none d-lg-block m-l-15" onclick="window.location='{{url('role/list')}}'"><i class="fa fa-list"></i> Role List </button>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('role.list') }}" class="text text-info" style="float: right">Go Back</a><br>
                @if($errors->any())
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach()                            
                </div>
                @endif
                <form class="m-t-10" action="{{ route('role.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="row">
                           
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Name</label>
                                    <input type="text" name="role_name" style="text-transform: capitalize;" class="form-control">   
                                </div>
                            </div>

                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-info">Submit</button>
                            <button type="reset" class="btn btn-inverse">Reset</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
@endsection
