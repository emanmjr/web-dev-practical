<?php

namespace App\Http\Controllers;

use App\Expense as Model;
use App\ExpenseCategory;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    //

    public function index()
    {
        $expenses = Model::all();
    	$expenseCategory = ExpenseCategory::all();
    	return view('backend.expenses.index', compact('expenses', 'expenseCategory'));
    }

    public function store(Request $request)
    {
    	// Validations
    	$data = $request->validate([
            'amount' => 'required',
            'expense_category_id' => 'required',
            'entry_date' => 'required'
        ]);

    	// Store Data
        Model::create([
            'amount' => $request->amount,
            'expense_category_id' => $request->expense_category_id,
            'entry_date' => \Carbon\Carbon::parse($request->entry_date)->format('Y-m-d')
        ]);

        return back()->with('success');


    }

    public function update(Request $request)
    {

    	// Validations
    	$data = $request->validate([
            'amount' => 'required',
            'expense_category_id' => 'required',
            'entry_date' => 'required'
        ]);



    	// Update Data
        $role = Model::find($request->expense_category_id);
        $role->amount = $request->amount;
        $role->expense_category_id = $request->expense_category_id;
        $role->entry_date = \Carbon\Carbon::parse($request->entry_date)->format('Y-m-d');
        $role->save();


        return back()->with('success');

        
    }

    public function destroy(Request $request)
    {

    	// Update Data
        $role = Model::find($request->del_expense_id)->delete();
        
        return back()->with('success');

        
    }
}
