<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory;

    protected $table = "kelas";

    protected $primaryKey = "id";

    public function penggunas()
    {
        return $this->hasMany(pengguna::class, "id_kelas");
    }

    public function mapels(){
        return $this->belongsToMany(mapel::class, "kelas_mapels", "id_kelas", "id_mapel");
    }
}
