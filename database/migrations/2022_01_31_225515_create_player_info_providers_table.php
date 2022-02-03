<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerInfoProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_info_providers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('player_id')->unsigned()->unique();
            $table->bigInteger('provider_id')->unsigned()->unique()->index();
            $table->uuid('provider_uuid')->index();
            $table->string('last_username');
            $table->string('previous_username')->nullable();

            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_info_providers');
    }
}
