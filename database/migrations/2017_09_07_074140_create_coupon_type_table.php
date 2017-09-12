<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/* 卡券类型迁移文件 */

class CreateCouponTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //卡券类型表
        Schema::create('card_coupon_type', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->comment('店铺id');
            $table->string('name','20')->comment('卡券名称');
            $table->string('logo','50')->comment('卡券logo');
            $table->double('buy_price',10,2)->comment('卡券使用金额');
            $table->double('discount_price',10,2)->comment('卡券优惠金额');
            $table->integer('limit_number')->comment('领用限制');
            $table->integer('coupon_number')->comment('发布数量');
            $table->date('expiration_date')->comment('到期日期');
            $table->enum('publish',array('published','unpublished'))->default('published')
                  ->comment('是否发布:1.published->发布,2.unpublished->不发布');
            $table->dateTime('use_date')->nullable()->comment('卡券使用时间');
            $table->text('descriptions')->nullable()->comment('描述');
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
        Schema::dropIfExists('card_coupon_type');
    }
}
