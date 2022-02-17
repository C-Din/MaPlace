<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->date("date_event");
            $table->time("time_event");
            $table->string("image_event");
            $table->integer("state")->default(0);
            $table->timestamps();

            $table->unsignedTinyInteger("location_id");
        });

        Schema::table('events', function(Blueprint $table){
            $table->foreign('location_id')->references('id')
                                      ->on('locations')
                                      ->onDelete('restrict')
                                      ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
