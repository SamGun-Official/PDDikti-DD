<?php

namespace App\Models\istts_kampus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ISTTSKampusLog extends Model
{
    use HasFactory;

    protected $connection = 'istts_kampus';
    public $table = 'istts_kampus_log';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'message',
        'action',
    ];
}
