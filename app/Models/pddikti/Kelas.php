<?php

namespace App\Models\pddikti;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $connection = 'pddikti';
    public $table = 'mv_kelas';
    public $timestamps = true;

    protected $fillable = [
        'kode_matkul',
        'nrp_mahasiswa',
        'asal_kampus',
    ];
}
