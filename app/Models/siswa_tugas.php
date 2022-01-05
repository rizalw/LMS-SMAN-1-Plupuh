<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa_tugas extends Model
{
    use HasFactory;
    public function tugas()
    {
        return $this->belongsTo(tugas::class, "id_tugas");
    }
    public function siswas()
    {
        return $this->belongsTo(pengguna::class, "id_siswa");
    }
}
