<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('coupon_gift_id')->unsigned();
            $table->string('name');
            $table->text('success_message');
            $table->text('broadcast_message')->nullable();
            $table->text('meta_description')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();

            $table->foreign('coupon_gift_id')->references('id')->on('coupon_gifts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
