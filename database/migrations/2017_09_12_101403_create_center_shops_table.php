<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/* 中心店铺关系表 */

class CreateCenterShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('center_shops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->comment('店铺id');
            $table->integer('center_id')->comment('中心id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('center_shops');
    }
}
