<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bab extends Model
{
    use HasFactory;

    protected $table = "bab";

    protected $primaryKey = "id";

    public function tugas()
    {
        return $this->hasMany(tugas::class, "id_bab");
    }

    public function mapels()
    {
        return $this->belongsTo(mapel::class, 'id_mapel');
    }
}
