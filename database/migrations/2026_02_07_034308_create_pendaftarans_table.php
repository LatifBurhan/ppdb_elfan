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
    Schema::create('pendaftarans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke tabel users

        // 1. Data Pribadi
        $table->string('nama_lengkap');
        $table->string('tempat_lahir');
        $table->date('tanggal_lahir');
        $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
        $table->integer('tinggi_badan');
        $table->integer('berat_badan');
        $table->string('no_ktp', 16)->unique();
        $table->text('alamat_lengkap');
        $table->string('email_pendaftar');
        $table->string('no_telp', 15);
        $table->string('instagram')->nullable();

        // 2. Data Orang Tua / Wali
        $table->string('nama_bapak');
        $table->text('alamat_bapak');
        $table->string('pekerjaan_bapak');
        $table->string('no_telp_bapak', 15);
        $table->string('nama_ibu');
        $table->text('alamat_ibu');
        $table->string('pekerjaan_ibu');
        $table->string('no_telp_ibu', 15);

        // 3. Data Sekolah / Instansi
        $table->string('asal_sekolah');
        $table->string('jurusan');
        $table->text('alamat_sekolah');

        // Status Pendaftaran untuk Admin
        // Pastikan semua pilihan status ada di sini (case-sensitive)
        $table->enum('status', ['pending', 'lolos', 'gagal'])->default('pending');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
