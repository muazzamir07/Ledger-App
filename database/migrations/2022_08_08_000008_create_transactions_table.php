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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->unsignedBigInteger('transaction_type_id');
            $table->unsignedBigInteger('tax_id')->nullable();
            $table->bigInteger('amount');
            $table->unsignedBigInteger('account_id1');
            $table->foreign('account_id1')->references('id')->on('accounts'); 
            
            $table->unsignedBigInteger('account_id2');
            $table->foreign('account_id2')->references('id')->on('accounts');
        
            $table->foreign('transaction_type_id')->references('id')->on('transaction_types');
            $table->foreign('tax_id')->references('id')->on('taxes');
            
            $table->unsignedBigInteger('cost_center_id')->nullable();
            $table->foreign('cost_center_id')->references('id')->on('cost_centers')->onDelete('cascade');

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
        Schema::dropIfExists('transactions');
    }
};
