<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('content');
        });

        DB::table('events')->insert(
            array(
                'title' => 'title of the event',
                'content' => 'content of the event'
            )
        );
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}
