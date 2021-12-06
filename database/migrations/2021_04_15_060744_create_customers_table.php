<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
	    Schema::create('customers', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('username');
		    $table->string('password');
		    $table->string('email');
		    $table->dateTime('created');
	    });

	    DB::table('customers')->insert(
		    array(
			    'username' => 'customer',
			    'password' => bcrypt('1234'),
			    'email' => 'customer@gmail.com',
			    'created' =>  date('Y-m-d h:i:s', time())
		    )
	    );

        DB::table('customers')->insert(
            array(
                'username' => 'john',
                'password' => bcrypt('1234'),
                'email' => 'john@gmail.com',
                'created' =>  date('Y-m-d h:i:s', time())
            )
        );

        DB::table('customers')->insert(
            array(
                'username' => 'alice',
                'password' => bcrypt('1234'),
                'email' => 'alice@gmail.com',
                'created' =>  date('Y-m-d h:i:s', time())
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
        Schema::dropIfExists('customers');
    }
}
