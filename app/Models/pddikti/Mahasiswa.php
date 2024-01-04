<?php

namespace App\Models\pddikti;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $connection = 'pddikti';
    public $table = 'mv_mahasiswa';
    public $primaryKey = 'nrp_mahasiswa';
    public $incrementing = false;
    public $timestamps = true;

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
