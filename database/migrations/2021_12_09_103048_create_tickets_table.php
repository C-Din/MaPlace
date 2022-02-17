<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->integer("state")->default(0);
            $table->timestamps();

            $table->unsignedTinyInteger("ticket_type_id");
            $table->unsignedTinyInteger("event_id");
        });

        Schema::table('tickets', function(Blueprint $table){
            $table->foreign('ticket_type_id')->references('id')
                                      ->on('ticket_types')
                                      ->onDelete('restrict')
                                      ->onUpdate('restrict');
            $table->foreign('event_id')->references('id')
                                      ->on('events')
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
        Schema::dropIfExists('tickets');
    }
}
