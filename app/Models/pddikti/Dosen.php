<?php

namespace App\Models\pddikti;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $connection = 'pddikti';
    public $table = 'dosen';
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
