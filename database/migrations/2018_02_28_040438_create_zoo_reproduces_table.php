<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZooReproducesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zoo_reproduces', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('zoo_id');
            $table->enum('is_success',['yes','no'])->comment('是否繁殖成功');
            $table->dateTime('preparation_time')->comment('预产时间');
            $table->dateTime('prepare_time')->comment('备产时间');
            $table->dateTime('actual_time')->comment('实产时间');
            $table->integer('create_hour')->comment('生产时间(单位:小时)');
            $table->integer('create_number')->comment('生产次数');
            $table->integer('fertilization_number')->comment('受精数量');
            $table->integer('not_fertilization_number')->comment('未受精数量');
            $table->integer('dead_number')->comment('折损数量');
            $table->string('descriptions',100)->comment('描述');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `zoo_reproduces` comment '宠物繁殖记录表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zoo_reproduces');
    }
}
