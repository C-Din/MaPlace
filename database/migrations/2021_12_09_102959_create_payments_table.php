<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer("amount");
            $table->integer('state')->default(0);
            $table->timestamps();

            $table->unsignedTinyInteger("user_id");
            $table->unsignedTinyInteger("payment_method_id");
        });

        Schema::table('payments', function(Blueprint $table){
            $table->foreign('user_id')->references('id')
                                      ->on('users')
                                      ->onDelete('restrict')
                                      ->onUpdate('restrict');
            $table->foreign('payment_method_id')->references('id')
                                      ->on('payment_methods')
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
        Schema::dropIfExists('payments');
    }
}
