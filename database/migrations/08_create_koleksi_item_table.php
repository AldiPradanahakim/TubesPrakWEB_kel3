<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('koleksi_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('koleksi_id')->unsigned();
            $table->bigInteger('id_podcast')->unsigned();
            $table->timestamps();

            // Relasi dengan tabel koleksi
            $table->foreign('koleksi_id')->references('id')->on('koleksi')->onDelete('cascade');

            // Relasi dengan tabel podcast
            $table->foreign('id_podcast')->references('id')->on('podcast')->onDelete('cascade');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('koleksi_item');
    }
};
