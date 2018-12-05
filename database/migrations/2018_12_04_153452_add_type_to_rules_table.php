<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToRulesTable extends Migration
{
//添加新的数据表， 字段或者索引到数据库   down相反
    public function up()
    {
        Schema::table('rules', function (Blueprint $table) {
            $table->string('type')->default('')->comment('规则类型:text/new/image...');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rules', function (Blueprint $table) {
            //
        });
    }
}
