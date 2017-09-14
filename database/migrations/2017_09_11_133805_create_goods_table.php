<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/* 商品表 */

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->comment('店铺id');
            $table->integer('category_id')->comment('分类id');
            $table->integer('inventory_quantity')->comment('库存数量');
            $table->string('name','20')->comment('商品名称');
            $table->double('reference_price',10,2)->comment('参考价格');
            $table->double('price',10,2)->comment('售价');
            $table->enum('goods_status',array('sold','out'))->default('sold')
                  ->comment('商品状态');
            $table->integer('total_sales')->comment('总销量');
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
        Schema::dropIfExists('goods');
    }
}
