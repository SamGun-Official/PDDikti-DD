<?php

namespace App\Models\istts_kampus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $connection = 'istts_kampus';
    public $table = 'mata_kuliah';
    public $primaryKey = 'kode_matkul';
    public $incrementing = false;
    public $timestamps = true;

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
