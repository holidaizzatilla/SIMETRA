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
        Schema::create('murojaahs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('instruktur_murojaah_id');
            $table->foreign('instruktur_murojaah_id')->references('id')->on('instruktur_murojaahs')->onDelete('cascade');
            $table->string('nis',15);
            $table->string('juz',10);
            $table->string('surah',50);
            $table->string('halaman',10);
            $table->string('catatan',255);
            $table->enum('kehadiran', ['hadir', 'alfa', 'izin', 'sakit']);
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('murojaahs');
    }
};
