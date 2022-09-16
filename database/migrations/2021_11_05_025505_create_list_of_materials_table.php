<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListOfMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_of_materials', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('project_name');
            $table->string('description');
            $table->string('description_material');
            $table->string('unit')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('unit_cost')->nullable();
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
        Schema::dropIfExists('list_of_materials');
    }
}
