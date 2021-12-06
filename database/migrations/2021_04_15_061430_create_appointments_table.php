<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
	public function up()
	{
		Schema::create('appointments', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('service_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('customer_id')->unsigned();
			$table->dateTime('time_start');
			$table->dateTime('time_end');
			$table->foreign('service_id')->references('id')->on('services')->onUpdate('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
			$table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade');
		});

		DB::table('appointments')->insert(
			array(
				'service_id' => 7,
				'user_id' => 2,
				'customer_id' => 2,
				'time_start' =>  date('Y-m-d h:i:s', time()+(60*60)),
				'time_end' => date('Y-m-d h:i:s', time()+(60*60*5))
			)
		);

        DB::table('appointments')->insert(
            array(
                'service_id' => 15,
                'user_id' => 3,
                'customer_id' => 3,
                'time_start' =>  date('Y-m-d h:i:s', time()+(60*60)),
                'time_end' => date('Y-m-d h:i:s', time()+(60*60*5))
            )
        );

        DB::table('appointments')->insert(
            array(
                'service_id' => 4,
                'user_id' => 3,
                'customer_id' => 3,
                'time_start' =>  date('Y-m-d h:i:s', time()+(60*60)),
                'time_end' => date('Y-m-d h:i:s', time()+(60*60*5))
            )
        );

        DB::table('appointments')->insert(
            array(
                'service_id' => 10,
                'user_id' => 2,
                'customer_id' => 3,
                'time_start' =>  date('Y-m-d h:i:s', time()+(60*60)),
                'time_end' => date('Y-m-d h:i:s', time()+(60*60*5))
            )
        );

        DB::table('appointments')->insert(
            array(
                'service_id' => 4,
                'user_id' => 3,
                'customer_id' => 3,
                'time_start' =>  date('Y-m-d h:i:s', time()+(60*60)),
                'time_end' => date('Y-m-d h:i:s', time()+(60*60*5))
            )
        );
	}

	public function down()
	{
		Schema::dropIfExists('appointments');
	}
}
