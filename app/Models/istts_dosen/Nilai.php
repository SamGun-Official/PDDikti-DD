<?php

namespace App\Models\istts_dosen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $connection = 'istts_dosen';
    public $table = 'nilai';
    protected $primaryKey = null;
    public $incrementing = null;
    public $timestamps = true;

    protected $fillable = [
        'kode_matkul',
        'nrp_mahasiswa',
        'nilai_uts',
        'nilai_uas',
        'nilai_akhir',
            'asal_kampus',
            // 'created_at',
            // 'updated_at'
    ];
}
