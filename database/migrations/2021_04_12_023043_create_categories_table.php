<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        DB::table('categories')->insert(
            array(
                'name' => 'Promos'
            )
        );

        DB::table('categories')->insert(
            array(
                'name' => 'Hair'
            )
        );

        DB::table('categories')->insert(
            array(
                'name' => 'Skin'
            )
        );

        DB::table('categories')->insert(
            array(
                'name' => 'Nail'
            )
        );

        DB::table('categories')->insert(
            array(
                'name' => 'Body'
            )
        );

        DB::table('categories')->insert(
            array(
                'name' => 'Bridal'
            )
        );

        DB::table('categories')->insert(
            array(
                'name' => 'Kids'
            )
        );
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
