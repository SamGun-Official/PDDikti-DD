<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';
    protected $primaryKey = 'nidn_dosen';
    protected $incrementing = false;
    protected $timestamps = true;
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
