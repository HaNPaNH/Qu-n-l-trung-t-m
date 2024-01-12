<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level_id',
        'name',
        'start_day',
        'end_day',
        'fee',
        'prediction_number',
        'actual_number',
        'lessons_number',
    ];
}
