<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tranning extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'timeStart',
        'timeEnd',
        'about',
        'status',
        'quest_data',
        'array_users',
        'createdId'
    ];
}
