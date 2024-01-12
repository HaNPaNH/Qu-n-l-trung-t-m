<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'class_id',
        'name',
        'paid_day',
        'paid_content',
        'fee',
        'paid_status',
    ];
}
