<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListLabor extends Model
{
    use HasFactory;
    protected $table ="list_of_labors";
    protected $primaryKey = 'id';
    protected $fillable = ['user_name','project_name','description','description_labor','number_labor','no_of_days','rate_day','amount'];
}
