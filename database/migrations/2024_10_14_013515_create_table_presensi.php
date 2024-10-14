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
        Schema::create('presensi', function (Blueprint $table) {
            $table->uuid("id")->unique()->primary();
            $table->uuid('id_user');
            $table->uuid('id_device');
            $table->date("tanggal");
            $table->time("check_in");
            $table->time("check_out");
            $table->string("keterangan");
            $table->string('data_qr_code');
            $table->string('lat');
            $table->string('lang');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_device')->references('id')->on('devices');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi');
    }
};
