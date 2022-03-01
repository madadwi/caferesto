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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('pelanggan');
            $table->foreignId('menu_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('pegawai');
            $table->string('qty');
            $table->string('total');
            $table->string('status')->default('Belum Dibayar');
            $table->string('beli')->nullable();
            $table->string('kembali')->nullable();
            $table->date('date');
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
        Schema::dropIfExists('transaksis');
    }
};
