<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materi extends Model
{
    use HasFactory;

    protected $table = "materis";

    protected $primaryKey = "id";

    public function babs()
    {
        return $this->belongsTo(bab::class, 'id_bab');
    }

}
