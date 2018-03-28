<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('food_category_id')->comment('食物类型');
            $table->string('name',10)->comment('食物名称');
            $table->integer('sort')->comment('排序');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `foods` comment '食物表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foods');
    }
}
