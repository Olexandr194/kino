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
        Schema::create('cinema_news', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cinema_id');
            $table->unsignedBigInteger('news_id');
            $table->timestamps();

            $table->index('cinema_id', 'cinema_news_cinema_idx');
            $table->index('news_id', 'cinema_news_news_idx');

            $table->foreign('cinema_id', 'cinema_news_cinema_fk')->on('cinemas')->references('id');
            $table->foreign('news_id', 'cinema_news_news_fk')->on('news')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cinema_news');
    }
};
