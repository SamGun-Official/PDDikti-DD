<?php

namespace App\Models\istts_dosen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $connection = 'istts_dosen';
    public $table = 'mv_kelas';
    public $timestamps = true;

    protected $fillable = [
        'kode_matkul',
        'nrp_mahasiswa',
        'asal_kampus',
    ];
}
