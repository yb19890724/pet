<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/* 店铺表 */

class CreateShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name','20')->comment('店铺名称');
            $table->string('avatar','100')->comment('店铺头像');
            $table->string('mobile_phone','11')->comment('手机号');
            $table->dateTime('open_time')->comment('营业开始时间');
            $table->dateTime('end_time')->comment('营业结束时间');
            $table->enum('shop_status',array('auditNotPassed','auditThrough','open','rest'))
                  ->default('auditNotPassed')
                  ->comment('auditNotPassed 审核未通过 auditThrough 审核通过 open 营业中 rest 休息');
            $table->string('address','100')->comment('店铺地址');
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
        Schema::dropIfExists('shop');
    }
}
