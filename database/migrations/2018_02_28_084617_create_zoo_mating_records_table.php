<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZooMatingRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zoo_mating_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('zoo_id');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `zoo_mating_records` comment '宠物交配记录表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zoo_mating_records');
    }
}
