<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListMaterial extends Model
{
    use HasFactory;
    protected $table ="list_of_materials";
    protected $primaryKey = 'id'; 
    protected $fillable = ['project_name','description','description_material','unit','quantity','unit_cost','amount'];


}
