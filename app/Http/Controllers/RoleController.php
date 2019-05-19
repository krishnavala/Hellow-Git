x<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use DataTables;
use Auth;

class RoleController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        //$this->middleware('permission:Avani-Daily-production-list');
    }

    public function index() {
        return view('role_master.index');
    }

    public function add() {

        return view('role_master.add');
    }
    public function store(Request $request) {
        $this->validate($request, [
           'role_name' => 'required',
       ]);
        
        
        $role_id = DB::table('role')->insertGetId(
            array(

                'role_name' =>  request()->role_name,
                'created_by' => Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s'),
            )
        );    

        Session::flash('success_msg', 'Role Add success fully!');
        return redirect()->route('role.list');
    }

    public function delete(Request $request) {
        $id = $request->input('deleteroleId');
        DB::table("role")->where('role_id', $id)->update(['is_active'=>0]);
        return redirect()->route('role.list')
        ->with('success_msg', 'Role Delete success fully');
    }

    public function edit($id) {
        $role = DB::table('role')->where('role_id',$id)->first();
        return view('role_master.edit')
        ->with('role', $role);

    }

    public function update(Request $request) {
        $this->validate($request, [
            'role_name' => 'required',
        ]);

        DB::table('role')->where('role_id', request()->role_id)->update(
            array(
                'role_name' =>  request()->role_name,
                'created_by' => Auth::user()->id,
                'updated_at' => date('Y-m-d H:i:s'),
            )
        );
        return redirect()->route('role.list')
        ->with('success_msg', 'Role Update success fully');
    }


    function getroleList() {
        $query = DB::table('role')
        ->select('role.*')
        ->where('role.is_active',1);
        return DataTables::of($query)->addColumn('action', function ($query) {
            return '<a class="btn btn-primary btn-xs text-white roleedit" href="edit/' . $query->role_id . '"><i class="fa fa-pencil"></i> Edit</a> '
            . '<a data-role_id="' . $query->role_id . '" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-xs text-white roledelete"><i class="fa fa-remove"></i> Delete</a>';
        })
        ->make(true);
    }

}
