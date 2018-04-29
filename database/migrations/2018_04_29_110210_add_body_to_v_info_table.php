<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBodyToVInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('v_info', function (Blueprint $table) {
            $table->string('body')->nullable();
        });
    }

    public function down()
    {
        Schema::table('v_info', function (Blueprint $table) {
            $table->dropColumn('body');
        });
    }
}
