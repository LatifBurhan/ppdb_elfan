<?php

namespace App\Actions;

use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth;

class CreatePendaftaranAction
{
    public function execute(array $data): Pendaftaran
    {
        // Hubungkan data dengan user yang sedang login
        $data['user_id'] = Auth::id();

        // Gunakan updateOrCreate agar data yang sudah ada diperbarui, bukan dibuat baru
        return Pendaftaran::updateOrCreate(
            ['user_id' => Auth::id()], // Kunci pencarian
            $data                     // Data yang disimpan/diupdate
        );
    }
}
