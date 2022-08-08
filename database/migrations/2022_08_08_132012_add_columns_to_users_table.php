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
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->nullable();
            $table->string('nickname')->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('card_number')->nullable();
            $table->string('language')->nullable();
            $table->string('sex')->nullable();
            $table->string('phone')->nullable();
            $table->string('birthday')->nullable();
            $table->string('city')->nullable();
            $table->unsignedSmallInteger('role')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('surname');
            $table->dropColumn('nickname');
            $table->dropColumn('address');
            $table->dropColumn('card_number');
            $table->dropColumn('language');
            $table->dropColumn('sex');
            $table->dropColumn('phone');
            $table->dropColumn('birthday');
            $table->dropColumn('city');
            $table->dropColumn('role');
        });
    }
};
