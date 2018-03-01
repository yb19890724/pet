<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZooFeedingRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zoo_feeding_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('zoo_id');
            $table->integer('food_id');
            $table->integer('zoo_boxes_id');
            $table->integer('feeding_number')->comment('喂食次数');
            $table->string('descriptions',100)->comment('描述');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `zoo_feeding_records` comment '宠物喂养记录表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zoo_feeding_records');
    }
}
