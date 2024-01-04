<?php

namespace App\Models\pddikti;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $connection = 'pddikti';
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
