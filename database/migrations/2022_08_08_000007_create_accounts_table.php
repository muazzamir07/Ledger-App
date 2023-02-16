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
        Schema::create('accounts', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('entity_id');
        $table->unsignedBigInteger('account_type_id');
        $table->text('description');
        $table->foreign('entity_id')->references('id')->on('entities');
        $table->foreign('account_type_id')->references('id')->on('account_types');
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
        Schema::dropIfExists('accounts');
    }
};
