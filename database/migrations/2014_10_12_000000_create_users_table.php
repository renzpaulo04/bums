<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('userName')->unique();
            $table->string('lastName');
            $table->string('firstName');
            $table->string('middleName');
            $table->string('password');
            $table->string('role');
            $table->rememberToken();
            $table->timestamps();
            
        });

        // Insert admin account
        DB::table('users')->insert(
            array(
                'lastName' => '',
                'firstName' => 'Administrator',
                'middleName' => '',
                'userName' => 'Admin',
                'password' => Hash::make('admin'),
                'role' => 'ADMIN'
            )
            );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
