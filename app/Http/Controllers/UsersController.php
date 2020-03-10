<?php

namespace App\Http\Controllers;

use App\User as Model;
use App\Role;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //

    public function index()
    {
        $users = Model::all();
    	$roles = Role::all();
    	return view('backend.users.index', compact('users', 'roles'));
    }

    public function store(Request $request)
    {

    	// Validations
    	$data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required'
        ]);


    	// Store Data
        Model::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make(Str::random(40)), //send email
            'role_id' => $request->role_id
        ]);

        return back()->with('success');


    }

    public function update(Request $request)
    {

    	// Validations
    	$data = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);


    	// Update Data
        $role = Model::find($request->user_id);
        $role->name = $request->name;
        $role->email = $request->email;
        $role->save();


        return back()->with('success');

        
    }

    public function destroy(Request $request)
    {

    	// Update Data
        $role = Model::find($request->del_user_id)->delete();
        
        return back()->with('success');

        
    }
}
