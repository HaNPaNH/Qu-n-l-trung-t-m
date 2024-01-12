<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_class extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'class_id',
    ];
}