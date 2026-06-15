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
        Schema::create('wali_santris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wali',50);
            $table->string('no_telp',15);
            $table->string('nis',15);
            $table->string('username',15)->unique();
            $table->string('password',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wali_santris');
    }
};
