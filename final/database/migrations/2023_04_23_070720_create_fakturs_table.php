<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fakturs', function (Blueprint $table) {
            $table->id();
            $table->string('Invoice');
            $table->integer('Quantity');
            $table->string('NameItem');
            $table->string('Name'); // auto cek pakai seearch
            $table->string('Category'); // auto juga
            $table->string('Address');
            $table->integer('PostalCode');
            $table->integer('Subtotal');
            $table->integer('Total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fakturs');
    }
};
