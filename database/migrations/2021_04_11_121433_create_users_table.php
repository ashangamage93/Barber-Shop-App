<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->string('email');
            $table->dateTime('created');
	        $table->boolean('status');
        });

        DB::table('users')->insert(
            array(
                'username' => 'admin',
                'password' => bcrypt('1234'),
                'email' => 'admin@empirecuts.com',
                'created' =>  date('Y-m-d h:i:s', time()),
	            'status' => TRUE,
            )
        );

        DB::table('users')->insert(
            array(
                'username' => 'amal',
                'password' => bcrypt('1234'),
                'email' => 'amal@empirecuts.com',
                'created' =>  date('Y-m-d h:i:s', time()),
                'status' => TRUE,
            )
        );

        DB::table('users')->insert(
            array(
                'username' => 'tharuni',
                'password' => bcrypt('1234'),
                'email' => 'tharuni@empirecuts.com',
                'created' =>  date('Y-m-d h:i:s', time()),
                'status' => TRUE,
            )
        );
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
