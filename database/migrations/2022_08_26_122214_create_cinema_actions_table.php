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
        Schema::create('cinema_actions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cinema_id');
            $table->unsignedBigInteger('action_id');
            $table->timestamps();

            $table->index('cinema_id', 'cinema_action_cinema_idx');
            $table->index('action_id', 'cinema_action_action_idx');

            $table->foreign('cinema_id', 'cinema_action_cinema_fk')->on('cinemas')->references('id');
            $table->foreign('action_id', 'cinema_action_action_fk')->on('actions')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cinema_actions');
    }
};
