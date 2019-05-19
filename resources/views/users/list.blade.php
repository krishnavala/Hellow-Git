@extends('layouts.app')

@section('stylesheets')
<link href="{{asset('assets/node_modules/datatables/media/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">User List</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">

                <li class="breadcrumb-item "><a href="{{url('/home')}}">Home</a></li>
                <li class="breadcrumb-item active"><a class="breadcrumb-item active"  href="{{url('/index')}}">User List</a></li>
            </ol>
            <button  type="button" class="btn btn-info d-none d-lg-block m-l-15" onclick="window.location='{{ route("user.add") }}'"><i class="fa fa-plus-circle"></i> Add New user </button>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
              @if(Session::has('success_msg'))
              <div class="alert alert-success">
                <button class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>
                <i class="ace-icon fa fa-hand-o-right"></i>
                {{ Session::get('success_msg') }}
            </div>
            @endif
            <form id="deleteForm" action="{{ route('user.delete')}}" method="POST"  style="display: none">
              {{ csrf_field() }}
              <input type="hidden" name="deleteuserId" id="deleteUserId" value="0">
          </form>   


          <div class="table-responsive m-t-40">
            <table id="userListTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone No.</th>
                       <th>User Imag</th>
                      <th>Action</th>
                  </tr>
              </thead>

              <tbody>


              </tbody>
          </table>
      </div>
  </div>
</div>
</div>
</div>
</div>
<!-- model -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">
                Delete user</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
             Do You Really Want to Delete?
         </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger modelDeleteCnfrm">Delete</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<!-- overmodel -->
<!-- newmodel -->

@endsection



@section('script')
 <script>
    var userListURL = "{{ route('user.getUserList') }}";
</script>


<script src="{{asset('js/userlist.js') }}"></script>
<!-- end - This is for export functionality only -->
@endsection