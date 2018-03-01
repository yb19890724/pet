<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZooBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zoo_boxes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('zoo_id')->comment('动物id');
            $table->integer('box_number')->comment('箱子编号');
            $table->integer('sort')->comment('排序');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `zoo_boxes` comment '宠物箱表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zoo_boxes');
    }
}
