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
        Schema::create('cinema_images', function (Blueprint $table) {
                $table->id();
                $table->string('image');
                $table->bigInteger('cinemas_id')->nullable();
                $table->foreign('cinemas_id')
                    ->on('cinemas')
                    ->references('id')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('cinema_images');
    }
};
