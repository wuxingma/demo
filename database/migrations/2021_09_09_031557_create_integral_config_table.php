<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntegralConfigTable extends Migration
{
    /**
     * 积分配置
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integral_config', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('level')->comment('级别');
            $table->string('name', 32)->comment('名称');
            $table->decimal('amount', 8, 2)->default(0.00)->comment('金额');
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
        Schema::dropIfExists('integral_config');
    }
}
