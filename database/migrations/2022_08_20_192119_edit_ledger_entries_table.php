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
        //
        Schema::table('ledger_entries', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('amount');
            $table->boolean('credit/debit');
            //$table->foreign('transaction_id')->references('id')->on('transactions'); 
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
