<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontrak extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pegawai',
        'id_jabatan',
        'kontrak',
        'kontrak_awal',
        'kontrak_akhir'
    ];
}
