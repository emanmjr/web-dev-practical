<?php

namespace App;
use App\ExpenseCategory;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'amount', 'entry_date', 'expense_category_id'
    ];

    public function expenseCat()
    {
    	return $this->hasOne(ExpenseCategory::class, 'id', 'expense_category_id');
    }
}
