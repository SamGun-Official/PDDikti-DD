<?php

namespace App\Models\istts_kampus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;
    protected $connection = 'istts_kampus';
    public $table = 'periode';
    public $primaryKey = 'id_periode';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'id_periode',
        'asal_kampus',
        'jenis_semester',
        'tahun_ajaran',
    ];
}
