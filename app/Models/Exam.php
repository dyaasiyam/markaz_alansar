<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    public function user()
{
    return $this->belongsTo(User::class);
}
public function teacher()
{
    return $this->belongsTo(Teacher::class, 'teacher_id');
}


}