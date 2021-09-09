<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntegralAmountRecoedTable extends Migration
{
    /**
     * 积分变动表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integral_amount_recoed', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->comment('用户ID');
            $table->decimal('integral_amount', 8, 2)->default(0.00)->comment('积分金额');
            $table->date('date');
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
        Schema::dropIfExists('integral_amount_recoed');
    }
}
