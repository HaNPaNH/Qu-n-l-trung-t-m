<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'class_id',
        'name',
        'score',
        'number_absent',
        'has_result',
    ];
}
