<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetGrowthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet_growths', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pet_id');
            $table->string('weight',50)->comment('重量');
            $table->string('body_length',50)->comment('体长');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `pet_growths` comment '宠物成长记录'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pet_growths');
    }
}
