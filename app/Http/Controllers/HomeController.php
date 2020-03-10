<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Move to Expenses Repository
        $expenses = Expense::selectRaw('SUM(expenses.amount) as totalAmount, expense_categories.name as categoryName')
                        ->join('expense_categories', 'expenses.expense_category_id', 'expense_categories.id')
                        ->groupBy('expense_categories.name')->get();

        return view('backend.home', compact('expenses'));
    }
}
