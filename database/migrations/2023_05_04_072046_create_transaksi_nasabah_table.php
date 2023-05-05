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
        Schema::create('transaksi_nasabah', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('idDataNasabah');
            $table->foreign('idDataNasabah')->references('id')->on('data_nasabah');
            $table->dateTime('TransactionDate');
            $table->string('Description');
            $table->string('DebitCreditStatus')->comment('D: Untuk Debit; C: Untuk Kredit');
            $table->string('Amount');
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
        Schema::dropIfExists('transaksi_nasabah');
    }
};
