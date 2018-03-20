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
            $table->string('name',50);
            $table->integer('boxes_id')->comment('箱子id');
            $table->integer('father_id')->comment('父id');
            $table->integer('mother_id')->comment('母id');
            $table->enum('sex',['male','female'])->comment('性别:公母');
            $table->enum('state',['good','normal','sick'])->comment('状态:1优秀,2正常,3病态');
            $table->string('descriptions',100)->comment('描述');
            $table->string('color',7)->comment('色系');
            $table->string('dominant_gene',50)->comment('显性基因');//checkbox
            $table->string('hide_gene',50)->comment('隐性基因');//checkbox
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
