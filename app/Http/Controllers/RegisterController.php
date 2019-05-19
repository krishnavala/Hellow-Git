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


class RegisterController extends Controller
{

  
protected $redirectTo = '/home';
   
 public function create(Request $request)
 {
        
     $this->validate($request, [

        'first_name' => 'required',
        'last_name' => 'required',
        'phone_no' => 'required',
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
            'created_at' => date('Y-m-d H:i:s'),
        )
    );      

    Session::flash('success_msg', 'User Store successfully!');
    return redirect('/home');

}



}