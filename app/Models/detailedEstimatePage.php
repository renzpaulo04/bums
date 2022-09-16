<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailedEstimatePage extends Model
{
    use HasFactory;
    protected $table ="detailed_estimate_pages";
    protected $primaryKey = 'id';
    protected $fillable = ['user_name','project_Id','item_Number','description','quantity','sub_total'];
}
