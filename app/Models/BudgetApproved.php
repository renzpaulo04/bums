<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetApproved extends Model
{
    use HasFactory;
    protected $table ="budgets";
    protected $primaryKey = 'id';
    protected $fillable = ['user_name','project_name','budget_alloted','budget_consumed','labor_consumed','material_consumed','balance'];
}
