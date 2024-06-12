<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    public function teachers()
{
    return $this->belongsToMany(Teacher::class, 'teacher_subject');
}

public function users()
{
    return $this->belongsToMany(User::class, 'user_subject', 'subject_id', 'user_id');
}
}
