<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\User;
use DB;
use Validator;
use Session;
use Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(User $user)
    {   
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    public function update(Request $request)
    { 
        /*echo $request;
        return;*/
        $id = Auth::user()->id;
     $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            
        ]);


  

        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }
       /* print_r($input) ;
        return;*/

         $user = User::find($id);

        $user->update($input);
         Session::flash('success_msg', 'Your Profile Update Successfully!');
        return back();
      

       
    }
}