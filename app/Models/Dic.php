<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dic extends Model
{
    use HasFactory;

    protected $fillable = [
        'lxid',
        'lx',
        'ly',
        'lxalt',
        'hm',
        'phon',
        'sec',
        'predva',
        'lxdial',
        'va',
        'ps',
        'et',
        'atr',
        'abst',
        'inf',
        'nopos',
        'pl',
        'plpos',
        'pm',
        'idsn',
        'cf',
        'cfdial',
        'agn',
        'dif',
        'sp',
        'phr',
        'mor',
        'morcom',
        'audio',
        'alisto',
        'prin',
        'min',
        'm_multiple',
        'morinv',
        'gl',
        'psext',
        'inv',
    ];

}
