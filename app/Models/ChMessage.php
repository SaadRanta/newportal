<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Chatify\Traits\UUID;

class ChMessage extends Model
{
    protected $fillable = [
        'teachername',
        'course',
        'studentname',
        'body',
        'requested',
        'teacher_id',
        'student_id',
    ];
    use HasFactory;
}
