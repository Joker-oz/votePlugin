<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVCandidateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('v_candidate', function (Blueprint $table) {
            $table->increments('id');
            $table->string('v_id')->index()->comment('投票的编号');
            $table->string('c_id')->index()->comment('候选者的编号');
            $table->string('c_name')->comment('候选者姓名或者作品名');
            $table->integer('c_score')->default('0')->comment('当前票数');
            $table->string('c_img')->comment('候选者图片地址');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('v_candidate');
    }
}
