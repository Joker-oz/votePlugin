<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('v_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('投票的标题');
            $table->integer('object')->comment('投票对象 1->人 2->物');
            $table->integer('status')->comment('投票的状态 1->进行中 0->结束');
            $table->string('qr_link')->comment('二维码图片地址');
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
        Schema::dropIfExists('v_info');
    }
}
