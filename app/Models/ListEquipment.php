<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class ListEquipment extends Model
{
    use HasApiTokens,HasFactory, Notifiable;
    protected $table ="list_of_equipments";
    protected $primaryKey = 'id';
    protected $fillable = ['user_name','project_name','description','description_equipment','number_equipment','equip_days','rental_day','amount'];

 
}
