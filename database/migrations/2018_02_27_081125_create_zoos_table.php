<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZoosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zoos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('boxes_id')->comment('箱子id');
            $table->integer('weight')->comment('体重');
            $table->integer('body_length')->comment('体长');
            $table->enum('sex',['male','female'])->comment('性别:公母');
            $table->string('descriptions',100)->comment('描述');
            $table->string('introduction',100)->comment('简介');
            //@todo 这里需要确定
            $table->string('dominant_gene',100)->comment('显性基因');
            $table->string('hide_gene',100)->comment('显性基因');
            $table->integer('sort')->comment('排序');
            $table->dateTime('birthday')->comment('出生日期');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `zoos` comment '宠物表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zoos');
    }
}
