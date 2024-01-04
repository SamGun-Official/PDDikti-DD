<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

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
