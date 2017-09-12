<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/* 地区迁移文件 */

class CreateAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->comment('父id');
            $table->string('name','20')->comment('地区名称');
            $table->string('pinyin','1')->comment('地区拼音缩写');
            $table->enum('level',array('1','2','3'))->comment('1：省级，2：地、市级，3：区、县级');
            $table->string('area_code','25')->comment('官方行政区划代码');

            //基础字段
            $table->integer('version')->comment('版本标识');
            $table->integer('sort')->comment('排序');
            $table->enum('status',array('yes','no'))
                ->default('yes')
                ->comment('状态标识: 1.yes:正常,2:no:删除');
            $table->integer('create_user_id')->comment('创建用户id');
            $table->integer('update_user_id')->comment('修改用户id');
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
        Schema::dropIfExists('area');
    }
}
