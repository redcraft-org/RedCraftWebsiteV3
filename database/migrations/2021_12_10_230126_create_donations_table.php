<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('receiver_player_id')->unsigned()->nullable();
            $table->bigInteger('donor_player_id')->unsigned()->nullable();
            $table->bigInteger('discount_id')->unsigned()->nullable();
            $table->integer('amount')->unsigned();
            $table->string('currency')->default('EUR');
            $table->string('conversion_rate')->default('1');
            $table->string('message')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('provider_name')->nullable();

            $table->foreign('receiver_player_id')->references('id')->on('players');
            $table->foreign('donor_player_id')->references('id')->on('players');
            $table->foreign('discount_id')->references('id')->on('discounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
}
