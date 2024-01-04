<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $table = 'periode';
    protected $primaryKey = 'id_periode';
    protected $incrementing = false;
    protected $timestamps = true;
    protected $fillable = [
        'id_periode',
        'asal_kampus',
        'jenis_semester',
        'tahun_ajaran',
    ];
}
