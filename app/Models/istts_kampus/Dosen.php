<?php

namespace App\Models\istts_kampus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $connection = 'istts_kampus';
    public $table = 'mv_dosen';
    public $primaryKey = 'nidn_dosen';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'nidn_dosen',
        'nik',
        'nama_lengkap',
        'jenis_kelamin',
        'email',
        'tanggal_lahir',
        'asal_kampus',
        'jabatan_fungsional',
        'pendidikan_terakhir',
        'ikatan_kerja',
        'program_studi',
        'status',
    ];
}
