<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('directory');
            $table->string('image');
        });

        DB::table('images')->insert(
            array(
                'directory' => 'service',
                'image' => 'bundled-services.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'directory' => 'service',
                'image' => 'dressing-men.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'directory' => 'service',
                'image' => 'dressing-women.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'directory' => 'service',
                'image' => 'hair-men.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'directory' => 'service',
                'image' => 'dressing-women.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'directory' => 'service',
                'image' => 'kids-boy.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'directory' => 'service',
                'image' => 'kids-girl.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'directory' => 'service',
                'image' => 'nail-men.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'directory' => 'service',
                'image' => 'nail-women.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'directory' => 'service',
                'image' => 'skin-men.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'directory' => 'service',
                'image' => 'skin-women.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'directory' => 'service',
                'image' => 'waxing-men.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'directory' => 'service',
                'image' => 'waxing-women.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'directory' => 'gallery',
                'image' => 'double-img-1.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'directory' => 'gallery',
                'image' => 'double-img-2.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'directory' => 'gallery',
                'image' => 'double-img-3.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'directory' => 'gallery',
                'image' => 'single-img-1.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'directory' => 'gallery',
                'image' => 'single-img-2.jpg'
            )
        );

    }


    public function down()
    {
        Schema::dropIfExists('images');
    }
}
