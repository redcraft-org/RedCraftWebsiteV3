<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalizedArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localized_articles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('article_id')->unsigned();
            $table->bigInteger('language_id')->unsigned();
            $table->string('slug');
            $table->string('title');
            $table->text('content');
            $table->string('author');
            $table->string('summary')->nullable();
            $table->string('translation_source')->default('auto');


            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
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
        Schema::dropIfExists('localized_articles');
    }
}
