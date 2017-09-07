<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->double('price',10,2)->comment('卡券优惠金额');
            $table->string('coupon_code','15')->comment('卡券券码');
            $table->integer('limit_number')->comment('领用限制');
            $table->integer('number')->comment('发布数量');
            $table->date('begin_date')->comment('使用开始日期');
            $table->date('expiration_date')->comment('到期日期');
            $table->enum('publish',array('published','unpublished'))
                  ->comment('是否发布:1.published->发布,2.unpublished->不发布');
            $table->dateTime('use_date')->comment('卡券使用时间');
            $table->text('description')->comment('描述');
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
