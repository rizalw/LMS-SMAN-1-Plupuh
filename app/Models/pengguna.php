<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    use HasFactory;

    protected $table = "penggunas";

    protected $primaryKey = "id";

    public function kelas()
    {
      return $this->belongsTo(kelas::class, "id_kelas");
    }
}
