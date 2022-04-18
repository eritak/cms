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
        Schema::create('ExchangeOrder', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->integer('users_id');
             $table->datetime('datetime');
             $table->integer('PaymentMonth');
             $table->float('amount');
             $table->integer('ExchangeOrderTypes_id');
             $table->float('OrderRate');
             $table->string('Results_id');
             $table->float('FinalRate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ExchangeOrder');
    }
};
