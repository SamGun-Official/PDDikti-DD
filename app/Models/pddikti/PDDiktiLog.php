<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PDDiktiLog extends Model
{
    use HasFactory;

    protected $connection = 'pddikti';
    public $table = 'pddikti_log';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'message',
        'action',
    ];
}
