<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/* 用户表 */

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('short_name','20')->comment('昵称');
            $table->string('real_name','20')->comment('用户真实姓名');
            $table->string('password','20')->comment('密码');
            $table->string('id_card','20')->comment('身份证');
            $table->enum('sex',array('male','female','secrecy'))
                  ->comment('性别   (male)男，(female)女，(secrecy)保密');
            $table->date('birthday')->comment('出生日期');
            $table->string('mobile_phone','20')->unique()->comment('电话');
            $table->string('email','20')->unique()->comment('邮箱');
            $table->string('avatar','20')->comment('头像');

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
        Schema::dropIfExists('customer');
    }
}
