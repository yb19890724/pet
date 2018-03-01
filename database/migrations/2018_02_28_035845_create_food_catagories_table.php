<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodCatagoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_catagories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('食物类型名称');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `food_catagories` comment '食物分类表'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_catagories');
    }
}
