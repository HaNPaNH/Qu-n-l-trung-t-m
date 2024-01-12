<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'account_id',
        'class_id',
        'name',
        'address',
        'workplace',
        'phone',
    ];
}
