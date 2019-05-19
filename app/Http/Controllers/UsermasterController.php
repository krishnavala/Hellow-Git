<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use DataTables;
use DB;
use Validator;
use Session;


class UsermasterController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add() {

     return view('users/add');
 }
 public function store(Request $request)
 {
         // print_r($_FILES);
         // return;
     $id = Auth::user()->id;
     $this->validate($request, [

        'first_name' => 'required',
        'last_name' => 'required',
        'phone_no' => 'required|numeric|min:10|max:10',
        'email' => 'required|email|unique:users,email',
        'password' => 'same:confirm-password',
        'user_img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    
     $image = $request->file('user_img');
     $imageName = time().'.'.$image->getClientOriginalExtension();
     $destinationPath = public_path('/profile_img');
     $image->move($destinationPath, $imageName);
     
     

    $input = $request->all();
    $input['password'] = Hash::make($input['password']);
   

    $user_id = DB::table('users')->insertGetId(
        array(

            'name' =>  $input['first_name']." ".$input['last_name'],
            'first_name' =>   request()->first_name,
            'last_name' =>  request()->last_name,
            'email' => request()->email,
            'user_img' => $imageName,
            'phone_no' => request()->phone_no,
            'password' => $input['password'],
            'created_by' => Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
        )
    );      

    Session::flash('success_msg', 'User Store successfully!');
    return redirect('index');

}




public function index() {
    return view('users.list');
}
function getUserList() {
    $query = DB::table('users')
    ->select('users.*') ->where('users.is_active', 1)
    ;
    return DataTables::of($query)
    ->addColumn('user_img', function ($query) {
                            $dummyimg = 'dummy-image.jpg';
                            if ($query->user_img == "") {
                                return '<img src="profile_img/' . $dummyimg . '" height="50px" width="50px">';
                            } else {
                                return '<img src="profile_img/' . $query->user_img . '" height="50px" width="50px">';
                            }
                        })
    ->addColumn('action', function ($query) {
        return '<a class="btn btn-success  text-white useredit" href="user/edit/' . $query->id . '"><i class="fas fa-edit"></i> Edit</a> '
        . '<a data-id="' . $query->id . '" data-toggle="modal" data-target="#myModal" class="btn btn-danger  text-white userdelete"><i class="fas fa-trash"></i> Delete</a>';
    })->rawColumns(['user_img', 'action'])
    ->make(true);
}
public function delete(Request $request) {
    $id = request()->deleteuserId;
    DB::table("users")->where('id', $id)->update(['is_active'=>0]);
    Session::flash('success_msg', 'User Deleted successfully!');
    return redirect()->route('user.list') ;
}


public function edit($id)
{   
    $user = DB::table('users')->where('id', $id)->first();
    return view('users.edit', compact('user'));
}

public function update(Request $request) {
   $id = request()->id;
   $user = DB::table('users')->where('id', $id)->first();

   $this->validate($request, [

    'first_name' => 'required|min:50|max:50',
    'last_name' => 'required|min:50|max:50',
    'phone_no' =>  'required|numeric|min:10|max:10',
    'email' => 'required|email|unique:users,email,'.$id,
    'password' => 'same:confirm-password',
    'user_img' => 'image|mimes:jpeg,png,jpg|max:2048',
]);
        
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input['password'] = $user->password;    
        }

 if ($request->hasfile('user_img')) {
      $image = $request->file('user_img');
     $imageName = time().'.'.$image->getClientOriginalExtension();
     $destinationPath = public_path('/profile_img');
     $image->move($destinationPath, $imageName);      
}
else
{
  $imageName = request()->user_img_value;
}


DB::table('users')->where('id', request()->id)->update(
    array(
        'name' =>  $input['first_name']." ".$input['last_name'],
        'first_name' =>   request()->first_name,
        'last_name' =>  request()->last_name,
        'email' => request()->email,
        'phone_no' => request()->phone_no,
        'user_img' => $imageName,
        'password' => $input['password'],
        'created_by' => Auth::user()->id,
        'updated_at' => date('Y-m-d H:i:s'),
    )
);
Session::flash('success_msg', 'User Update successfully!');
    return redirect('index');
    
}
}