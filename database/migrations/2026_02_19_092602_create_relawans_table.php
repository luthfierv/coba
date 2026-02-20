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
        Schema::create('relawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('pekerjaan');
            $table->string('pendidikan');
            $table->text('alamat');
            $table->string('no_hp', 25);
            $table->string('email')->unique();
            $table->string('lokasi_domisili');
            $table->string('area_tugas');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamp('tanggal_disetujui')->nullable();
            $table->date('masa_aktif')->nullable();
            $table->boolean('is_public_contact')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relawans');
    }
};
