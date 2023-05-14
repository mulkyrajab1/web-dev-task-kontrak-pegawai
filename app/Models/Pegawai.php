<?php

namespace App\Models;
use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama_pegawai',
        'email',
        'password',
        'alamat',
        'jenis_kelamin',
        'gaji'
    ];
}

