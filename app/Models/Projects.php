<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $table ="projects";
    protected $primaryKey = 'id';
    protected $fillable = ['user_name','name_of_project','location'];

}
