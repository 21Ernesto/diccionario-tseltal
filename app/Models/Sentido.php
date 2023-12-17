<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sentido extends Model
{
    use HasFactory;

    protected $fillable = [
        'idsn',
        'sndial',
        'de',
        'pc',
        'pc1',
        'pc2',
        'pc3',
        'sc',
        'exnum',
        'de2',
        'exnum2',
        'de3',
        'exnum3',
        'sy',
        'sncf',
        'sncfdial'

    ];
}
