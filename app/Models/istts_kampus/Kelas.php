<?php

namespace App\Models\istts_kampus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $connection = 'istts_kampus';
    public $table = 'kelas';
    public $timestamps = true;

    protected $fillable = [
        'kode_matkul',
        'nrp_mahasiswa',
        'asal_kampus',
    ];
}
