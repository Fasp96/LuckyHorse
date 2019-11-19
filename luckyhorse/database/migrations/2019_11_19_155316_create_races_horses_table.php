<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRacesHorsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('races_horses', function (Blueprint $table) {

            //id do evento
            $table->BigInteger('race_id')->unsigned()->index();
            $table->foreign('race_id')->references('id')->on('races')->onDelete('cascade');
          
            //id do utilizador
            $table->BigInteger('horse_id')->unsigned()->index();
            $table->foreign('horse_id')->references('id')->on('horses')->onDelete('cascade');
        
            $table->primary(['race_id','horse_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('races_horses');
    }
}
