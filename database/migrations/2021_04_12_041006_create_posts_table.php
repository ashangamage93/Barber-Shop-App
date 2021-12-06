<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('description');
        });

        DB::table('posts')->insert(
            array(
                'title' => '8 Attractive Offers For Your Salon To Drive Clients',
                'description' => 'Running a salon is a serious business and getting clients through the door is a big part of that business. Let’s face it, your salon business would be nowhere if you didn’t get repeat business from returning customers. Your business is thriving because of them and you need to give it your all to retain them. The best way to make sure they stay is by rolling out attractive salon offers.
Promotions, offers and deals is a fool-proof way to attract new clients and retain old ones. However, do not end up lowering your prices to such an extent that you hurt long-term business. Your offers for salon should be such that you are bringing clients through the door by adding value but not compromising on your prices.'
            )
        );

        DB::table('posts')->insert(
            array(
                'title' => 'Top Ideas & Inspiration to Decorate your Dream Salon',
                'description' => 'The hair and beauty industry are all about appearance and visual aesthetics. A client leaves their home and visits a salon to get pampered in an environment that is soothing, tranquilising and visually-stunning. The goal is to make your customer feel good from the moment he or she walks into your salon. Without a doubt, salon décor plays an important role in determining your success and bottom line.
Setting up a new or existing salon can be quite an overwhelming process because you have many things to look into such as salon layout, interior design schemes, services, products, hiring staff and so on. However, designing your salon is supposed to be fun. Try not to make it stressful.'
            )
        );
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
