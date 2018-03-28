<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetFeedingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet_feedings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pet_id');
            $table->integer('food_id');
            $table->integer('food_category_id');
            $table->tinyInteger('unit')->comment('单位:1只,2克');
            $table->integer('number')->comment('数量');
            $table->string('descriptions',100)->nullable()->comment('描述');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `pet_feedings` comment '宠物喂养记录表'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pet_feedings');
    }
}
