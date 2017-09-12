<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/* 配送中心 */

class CreateCenterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('center', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name','20')->comment('中心名称');
            $table->string('center','30')->comment('中心点');
            $table->enum('publish',array('published','unpublished'))->default('published')
                  ->comment('是否发布:1.published->发布,2.unpublished->不发布');
            $table->string('address','200')->comment('中心地址');
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
        Schema::dropIfExists('center');
    }
}
