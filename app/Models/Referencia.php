<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'refid',
        'author',
        'year',
        'title',
        'pub',
        'nt'
    ];
}
