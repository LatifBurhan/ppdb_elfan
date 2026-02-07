<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
protected $fillable = [
    'user_id', 'nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin',
    'tinggi_badan', 'berat_badan', 'no_ktp', 'alamat_lengkap', 'email_pendaftar',
    'no_telp', 'instagram',
    'nama_bapak', 'pekerjaan_bapak', 'no_telp_bapak', 'alamat_bapak', 
    'nama_ibu', 'pekerjaan_ibu', 'no_telp_ibu', 'alamat_ibu',         
    'asal_sekolah', 'jurusan', 'alamat_sekolah', 'status',
];
    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
