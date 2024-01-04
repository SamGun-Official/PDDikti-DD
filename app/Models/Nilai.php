<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';
    protected $timestamps = true;
    protected $fillable = [
        'kode_matkul',
        'nrp_mahasiswa',
        'nilai_uts',
        'nilai_uas',
        'nilai_akhir',
        'asal_kampus',
    ];
}
