<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdPostsTable extends Migration
{
    public function up()
    {
        Schema::create('adposts', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->dateTime('time_start');
            $table->dateTime('time_end');
        });

        DB::table('adposts')->insert(
            array(
                'content' => 'advertising content is here',
                'time_start' =>  date('Y-m-d h:i:s', time()+(60*60)),
                'time_end' => date('Y-m-d h:i:s', time()+(60*60*5))
            )
        );
    }

    public function down()
    {
        Schema::dropIfExists('adposts');
    }
}
