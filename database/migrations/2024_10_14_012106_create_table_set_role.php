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
        Schema::create('set_role', function (Blueprint $table) {
            $table->uuid("id")->unique()->primary();
            $table->uuid('id_role');
            $table->uuid('id_user');
            $table->uuid('id_unit_kerja')->nullable();
            $table->uuid('id_actor');
            $table->foreign('id_role')->references('id')->on('role');
            $table->foreign("id_user")->references('id')->on('users');
            $table->foreign('id_actor')->references('id')->on('users');
            $table->foreign('id_unit_kerja')->references('id')->on('unit_kerja');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('set_role');
    }
};
