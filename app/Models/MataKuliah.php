<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';
    protected $primaryKey = 'kode_matkul';
    protected $incrementing = false;
    protected $timestamps = true;
    protected $fillable = [
        'kode_matkul',
        'nama_matkul',
        'kode_kelas',
        'id_periode',
        'nidn_dosen',
        'sks',
        'asal_kampus',
        'status',
    ];
}
