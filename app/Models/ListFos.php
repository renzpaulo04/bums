<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListFos extends Model
{
    use HasFactory;
    protected $table ="list_of_fos";
    protected $primaryKey = 'id';
    protected $fillable = ['user_name','project_name','description','description_fos','unit','quantity','unit_cost','amount'];

}
