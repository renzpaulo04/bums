<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListOfEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_of_equipments', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('project_name');
            $table->string('description');
            $table->string('description_equipment');
            $table->integer('number_equipment');
            $table->integer('equip_days')->nullable();
            $table->integer('rental_day')->nullable();
            $table->integer('amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_of_equipments');
    }
}
