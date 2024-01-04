<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'nrp_mahasiswa';
    protected $incrementing = false;
    protected $timestamps = true;
    protected $fillable = [
        'nrp_mahasiswa',
        'nama_lengkap',
        'jenis_kelamin',
        'tanggal_lahir',
        'asal_kampus',
        'jenjang',
        'semester_awal',
        'status',
    ];
}
