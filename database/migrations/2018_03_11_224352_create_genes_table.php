<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',10)->comment('基因名称');
            $table->enum('gene_type',['dominant','hide'])->comment('dominant:显性,hide:隐形');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `genes` comment '宠物基因表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genes');
    }
}
