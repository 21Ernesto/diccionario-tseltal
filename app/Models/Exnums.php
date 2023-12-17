<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exnums extends Model
{
    use HasFactory;

    protected $fillable = [
        'exnum',
        'xv',
        'xdial',
        'xe',
        'audio',
    ];
}
