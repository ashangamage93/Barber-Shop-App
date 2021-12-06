<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->double('amount');
            $table->string('status');
            $table->integer('user_id')->unsigned();
            $table->integer('sub_category_id')->unsigned();
            $table->integer('image_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onUpdate('cascade');
            $table->foreign('image_id')->references('id')->on('images')->onUpdate('cascade');
        });

        DB::table('services')->insert(
            array(
                'name' => 'Naturals Cleanup with Classic Pedicure',
                'amount' => 3800,
                'status' => 'ENABLE',
                'user_id' => 2,
                'sub_category_id' => 1,
                'image_id' => 1,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Ume Care Cleanup with Classic Pedicure',
                'amount' => 4900,
                'status' => 'ENABLE',
                'user_id' => 3,
                'sub_category_id' => 1,
                'image_id' => 1,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Sothy’s Cleanup with Classic Pedicure',
                'amount' => 5400,
                'status' => 'ENABLE',
                'user_id' => 2,
                'sub_category_id' => 1,
                'image_id' => 1,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Acne treatment for clear Skin - Book 4 treatments and get fourth one free',
                'amount' => 4800,
                'status' => 'ENABLE',
                'user_id' => 3,
                'sub_category_id' => 1,
                'image_id' => 1,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Hair cut',
                'amount' => 1800,
                'status' => 'ENABLE',
                'user_id' => 3,
                'sub_category_id' => 2,
                'image_id' => 5,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Cut & Re-Style',
                'amount' => 2500,
                'status' => 'ENABLE',
                'user_id' => 3,
                'sub_category_id' => 2,
                'image_id' => 5,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Hair Wash & Blast dry',
                'amount' => 1000,
                'status' => 'ENABLE',
                'user_id' => 3,
                'sub_category_id' => 3,
                'image_id' => 5,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Gents Hair Cut - Junior',
                'amount' => 500,
                'status' => 'ENABLE',
                'user_id' => 2,
                'sub_category_id' => 4,
                'image_id' => 4,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Gents Hair Cut With Head Wash - Senior',
                'amount' => 800,
                'status' => 'ENABLE',
                'user_id' => 2,
                'sub_category_id' => 4,
                'image_id' => 4,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Express Color (10 Mins)',
                'amount' => 1500,
                'status' => 'ENABLE',
                'user_id' => 2,
                'sub_category_id' => 5,
                'image_id' => 4,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Grey coverage',
                'amount' => 2800,
                'status' => 'ENABLE',
                'user_id' => 2,
                'sub_category_id' => 5,
                'image_id' => 4,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Classic Clean up',
                'amount' => 1900,
                'status' => 'ENABLE',
                'user_id' => 3,
                'sub_category_id' => 6,
                'image_id' => 11,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Brightening Clean up (Ume Care)',
                'amount' => 3900,
                'status' => 'ENABLE',
                'user_id' => 3,
                'sub_category_id' => 6,
                'image_id' => 11,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Natural Glow Facial',
                'amount' => 2900,
                'status' => 'ENABLE',
                'user_id' => 3,
                'sub_category_id' => 7,
                'image_id' => 11,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Young Radiance Facial (Anti-Agining)',
                'amount' => 4000,
                'status' => 'ENABLE',
                'user_id' => 3,
                'sub_category_id' => 7,
                'image_id' => 11,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Clean Up (15 Mins)',
                'amount' => 750,
                'status' => 'ENABLE',
                'user_id' => 2,
                'sub_category_id' => 8,
                'image_id' => 10,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Classic Clean up',
                'amount' => 1900,
                'status' => 'ENABLE',
                'user_id' => 2,
                'sub_category_id' => 8,
                'image_id' => 10,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Natural Glow Facial',
                'amount' => 2900,
                'status' => 'ENABLE',
                'user_id' => 2,
                'sub_category_id' => 9,
                'image_id' => 10,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Young Radiance',
                'amount' => 4000,
                'status' => 'ENABLE',
                'user_id' => 2,
                'sub_category_id' => 9,
                'image_id' => 10,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Classic Manicure / Pedicure',
                'amount' => 1200,
                'status' => 'ENABLE',
                'user_id' => 3,
                'sub_category_id' => 10,
                'image_id' => 9,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Spa Manicure/Pedicure',
                'amount' => 2300,
                'status' => 'ENABLE',
                'user_id' => 3,
                'sub_category_id' => 10,
                'image_id' => 9,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Nail Color',
                'amount' => 525,
                'status' => 'ENABLE',
                'user_id' => 3,
                'sub_category_id' => 11,
                'image_id' => 9,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Nail Color French Tip',
                'amount' => 1000,
                'status' => 'ENABLE',
                'user_id' => 3,
                'sub_category_id' => 11,
                'image_id' => 9,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Classic Manicure / Pedicure',
                'amount' => 1200,
                'status' => 'ENABLE',
                'user_id' => 2,
                'sub_category_id' => 12,
                'image_id' => 8,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Spa Manicure/Pedicure',
                'amount' => 2300,
                'status' => 'ENABLE',
                'user_id' => 2,
                'sub_category_id' => 12,
                'image_id' => 8,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Full arms & Full Legs',
                'amount' => 2200,
                'status' => 'ENABLE',
                'user_id' => 3,
                'sub_category_id' => 13,
                'image_id' => 13,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Full Arms , Full Legs, Under Arms',
                'amount' => 4000,
                'status' => 'ENABLE',
                'user_id' => 3,
                'sub_category_id' => 13,
                'image_id' => 13,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Face Waxing',
                'amount' => 450,
                'status' => 'ENABLE',
                'user_id' => 3,
                'sub_category_id' => 14,
                'image_id' => 13,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Full arm to Full leg',
                'amount' => 2200,
                'status' => 'ENABLE',
                'user_id' => 2,
                'sub_category_id' => 15,
                'image_id' => 12,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Full Arms , Full Legs, Under Arms',
                'amount' => 4000,
                'status' => 'ENABLE',
                'user_id' => 2,
                'sub_category_id' => 15,
                'image_id' => 12,
            )
        );

        DB::table('services')->insert(
            array(
                'name' => 'Full arm to Full leg',
                'amount' => 3100,
                'status' => 'ENABLE',
                'user_id' => 2,
                'sub_category_id' => 16,
                'image_id' => 12,
            )
        );

    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
}
