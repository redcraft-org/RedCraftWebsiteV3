<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_mails', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->uuid('sender_uuid');
            $table->uuid('recipient_uuid');
            $table->text('message');
            $table->foreignId('original_language_id')->constrained('languages');
            $table->timestamp('sent_at');
            $table->timestamp('read_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_mails');
    }
};
