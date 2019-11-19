<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bets', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('race_id')->nullable();
            $table->foreign('race_id')->references('id')->on('races');

            $table->unsignedBigInteger('tournament_id')->nullable();
            $table->foreign('tournament_id')->references('id')->on('tournaments');

            $table->unsignedBigInteger('horse_id');
            $table->foreign('horse_id')->references('id')->on('horses');

            $table->float('value');
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
        Schema::dropIfExists('bets');
    }
}
