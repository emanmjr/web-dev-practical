<?php

namespace App\Http\Controllers;

use App\ExpenseCategory as Model;

use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    // Can factor validation in Expense Category Repository

    public function index()
    {
    	$categories = Model::all();
    	return view('backend.expense-categories.index', compact('categories'));
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
        $role = Model::find($request->expense_cat_id);
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();


        return back()->with('success');

        
    }

    public function destroy(Request $request)
    {

    	// Update Data
        $role = Model::find($request->del_expense_cat_id)->delete();
        
        return back()->with('success');

        
    }
}
