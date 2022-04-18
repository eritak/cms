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
        Schema::create('Contracts', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->integer('users_id');
             $table->date('date');
             $table->string('commodities_id');
             $table->integer('ShipmentMonth');
             $table->integer('ContractTypes_id');
             $table->float('quantity');
             $table->float('UnitPrice');
             $table->string('DeliveryMonths_id');
             $table->integer('Ports_id');
             $table->integer('DeliveryTerms_id');
             $table->integer('PaymentTerms_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Contracts');
    }
};
