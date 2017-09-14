<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/* 商品分类表 */

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->comment('父id');
            $table->string('name','10')->comment('分类名称');
            $table->string('english_name','10')->comment('分类英文名称');
            $table->string('color','10')->comment('颜色');
            $table->string('descriptions','50')->comment('分类说明');
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
        Schema::dropIfExists('categories');
    }
}
