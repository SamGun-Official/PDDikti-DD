<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $timestamps = true;
    protected $fillable = [
        'kode_matkul',
        'nrp_mahasiswa',
        'asal_kampus',
    ];
}
