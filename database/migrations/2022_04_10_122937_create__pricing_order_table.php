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
        Schema::create('PricingOrder', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->integer('users_id');
             $table->datetime('datetime');
             $table->integer('ShipmentMonth');
             $table->string('DeliveryMonths_id');
             $table->float('quantity');
             $table->integer('PricingOrderTypes_id');
             $table->float('OrderPrice');
             $table->string('Results_id');
             $table->float('FilledPrice');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PricingOrder');
    }
};
