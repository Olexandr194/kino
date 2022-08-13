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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->date('date');
            $table->time('time');
            $table->date('new_date')->nullable();
            $table->integer('cost');

            $table->bigInteger('cinema_id')->unsigned();
            $table->foreign('cinema_id')
                ->on('cinemas')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->bigInteger('movie_id')->unsigned();
            $table->foreign('movie_id')
                ->on('movies')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->bigInteger('cinema_hall_id')->unsigned();
            $table->foreign('cinema_hall_id')
                ->on('cinema_halls')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('schedule_models');
    }
};
