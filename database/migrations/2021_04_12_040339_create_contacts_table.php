<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->integer('telephone');
            $table->string('message');
            $table->dateTime('created');
        });

        DB::table('contacts')->insert(
            array(
                'name' => 'client',
                'email' => 'client@mail.com',
                'telephone' => 0711234567,
                'message' => 'message from the client',
                'created' => date('Y-m-d h:i:s', time()),
            )
        );
    }

    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
