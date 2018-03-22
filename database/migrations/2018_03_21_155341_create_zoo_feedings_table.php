<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZooFeedingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zoo_feedings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('zoo_id');
            $table->integer('food_id');
            $table->integer('food_category_id');
            $table->integer('zoo_box_id');
            $table->tinyInteger('unit')->comment('单位:1只,2克');
            $table->string('descriptions',100)->comment('描述');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `zoo_feedings` comment '宠物喂养记录表'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zoo_feedings');
    }
}
