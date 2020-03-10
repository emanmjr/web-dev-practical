<?php

namespace App\Http\Controllers;

use App\Role as Model;

use Illuminate\Http\Request;

class RolesController extends Controller
{
    //

    public function index()
    {
    	$roles = Model::all();
    	return view('backend.roles.index', compact('roles'));
    }

    public function store(Request $request)
    {

    	// Validations
    	$data = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);


    	// Store Data
        Model::create($data);

        return back()->with('success');


    }

    public function update(Request $request)
    {

    	// Validations
    	$data = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);


    	// Update Data
        $role = Model::find($request->role_id);
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();


        return back()->with('success');

        
    }

    public function destroy(Request $request)
    {

dd($request->del_role_id);
    	// Update Data
        $role = Model::find($request->del_role_id)->delete();
        
        return back()->with('success');

        
    }
}
