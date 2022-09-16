<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListOfLaborsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_of_labors', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('project_name');
            $table->string('description');
            $table->string('description_labor');
            $table->integer('number_labor')->nullable();
            $table->integer('no_of_days')->nullable();
            $table->integer('rate_day');
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
        Schema::dropIfExists('list_of_labors');
    }
}
