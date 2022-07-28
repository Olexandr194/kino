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
        Schema::create('action_images', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->bigInteger('action_id')->unsigned();
            $table->foreign('action_id')
                ->on('actions')
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
        Schema::dropIfExists('action_images');
    }
};
