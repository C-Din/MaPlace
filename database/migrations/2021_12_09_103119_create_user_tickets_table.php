<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('state')->default(0);
            $table->timestamps();

            $table->unsignedTinyInteger('ticket_id');
            $table->unsignedTinyInteger("payment_id");
        });

        Schema::table('user_tickets', function(Blueprint $table){
            $table->foreign('ticket_id')->references('id')
                                      ->on('tickets')
                                      ->onDelete('restrict')
                                      ->onUpdate('restrict');
            $table->foreign('payment_id')->references('id')
                                      ->on('payments')
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
        Schema::dropIfExists('user_tickets');
    }
}
