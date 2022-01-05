<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    use HasFactory;

    protected $table = "mapels";

    protected $primaryKey = "id";

    public function kelas(){
        return $this->belongsToMany(kelas::class, "kelas_mapels", "id_mapel", "id_kelas");
    }

    public function babs()
    {
        return $this->hasMany(bab::class, "id_mapel");
    }
}
