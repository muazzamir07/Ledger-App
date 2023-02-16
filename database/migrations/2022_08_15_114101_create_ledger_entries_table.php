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
        Schema::create('ledger_entries', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->unsignedBigInteger('entry_type_id');
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('transaction_id');
            $table->unsignedBigInteger('cost_center_id');
            $table->unsignedBigInteger('entity_id');
            
            $table->foreign('entry_type_id')->references('id')->on('entry_types'); 
            $table->foreign('account_id')->references('id')->on('accounts'); 
            $table->foreign('transaction_id')->references('id')->on('transactions'); 
            $table->foreign('cost_center_id')->references('id')->on('cost_centers');  
            $table->foreign('entity_id')->references('id')->on('entities'); 
            
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
        Schema::dropIfExists('ledger_entries');
    }
};
