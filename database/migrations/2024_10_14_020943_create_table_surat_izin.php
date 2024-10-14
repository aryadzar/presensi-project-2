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
        Schema::create('surat_izin', function (Blueprint $table) {
            $table->uuid("id")->unique()->primary();
            $table->string('status');
            $table->longText('keterangan');
            $table->date('tanggal');
            $table->uuid('id_actor');
            $table->uuid("id_presensi");
            $table->foreign('id_actor')->references('id')->on("users");
            $table->foreign('id_presensi')->references('id')->on('presensi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_izin');
    }
};
