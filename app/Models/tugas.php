<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tugas extends Model
{
  use HasFactory;

  protected $table = "tugas";

  protected $primaryKey = "id";

  public function babs()
  {
    return $this->belongsTo(bab::class, "id_bab");
  }

  public function siswas()
  {
    return $this->belongsToMany(pengguna::class, "siswa_tugas", "id_tugas", "id_siswa");
  }
}
