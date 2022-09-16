<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateDetailedEstimatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailed_estimate_pages', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('project_Id');
            $table->string('item_Number');
            $table->string('description');
            $table->integer('quantity');
            $table->string('unit_id');
            $table->integer('sub_total');
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
        Schema::dropIfExists('guest_forms');
    }
}
