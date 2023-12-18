<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;
    protected $fillable = [
        'teachername',
        'course',
        'studentname',
        'status',
        'requested',
        'teacher_id',
        'student_id',
    ];
}
