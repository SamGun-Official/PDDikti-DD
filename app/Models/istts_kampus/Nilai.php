<?php

namespace App\Models\istts_kampus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $connection = 'istts_kampus';
    public $table = 'mv_nilai';
    public $timestamps = true;

    protected $fillable = [
        'kode_matkul',
        'nrp_mahasiswa',
        'nilai_uts',
        'nilai_uas',
        'nilai_akhir',
        'asal_kampus',
    ];
}
