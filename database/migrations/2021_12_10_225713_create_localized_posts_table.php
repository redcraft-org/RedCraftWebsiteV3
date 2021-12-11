<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalizedPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localized_posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('post_id')->unsigned();
            $table->bigInteger('language_id')->unsigned();
            $table->string('slug')->unique()->index();
            $table->string('content');
            $table->string('author')->default('auto');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localized_posts');
    }
}
