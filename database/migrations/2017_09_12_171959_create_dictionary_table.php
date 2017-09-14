<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDictionaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictionary', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id');
            $table->string('code','20')->comment('字典类型编码');
            $table->string('name','20')->comment('字典类型名称');
            $table->string('remark','50')->nullable()->comment('备注');
            //基础字段
            $table->integer('version')->nullable()->comment('版本标识');
            $table->integer('sort')->nullable()->comment('排序');
            $table->enum('status',array('yes','no'))
                ->default('yes')
                ->comment('状态标识: 1.yes:正常,2:no:删除');
            $table->integer('create_user_id')->nullable()->comment('创建用户id');
            $table->integer('update_user_id')->nullable()->comment('修改用户id');
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
        Schema::dropIfExists('dictionary');
    }
}
