<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade');
        });

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Bundled Services',
                 'category_id' => 1
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Women Hair Cut',
                'category_id' => 2
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Women Hair Wash & Blast Dry',
                'category_id' => 2
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Men Hair Cut',
                'category_id' => 2
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Men Grey Coverage',
                'category_id' => 2
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Women Clean-up',
                'category_id' => 3
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Women Facials',
                'category_id' => 3
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Men Clean-up',
                'category_id' => 3
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Men Facials',
                'category_id' => 3
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Women Hand & Feet Care',
                'category_id' => 4
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Women Nail Lacquer',
                'category_id' => 4
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Men Hand & Feet Care',
                'category_id' => 4
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Women Classic Waxing',
                'category_id' => 5
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Women Premium Waxing',
                'category_id' => 5
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Men Classic Waxing',
                'category_id' => 5
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Men Premium Waxing',
                'category_id' => 5
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Women Bridal',
                'category_id' => 6
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Women Dressing',
                'category_id' => 6
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Men Dressing',
                'category_id' => 6
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Girls',
                'category_id' => 7
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Boys',
                'category_id' => 7
            )
        );

        DB::table('sub_categories')->insert(
            array(
                'name' => 'Boys & Girls',
                'category_id' => 7
            )
        );


    }

    public function down()
    {
        Schema::dropIfExists('sub_categories');
    }
}
