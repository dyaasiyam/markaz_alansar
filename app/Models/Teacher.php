<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Teacher extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];

    public function stage() {
        return $this->belongsTo(Stage::class);
    }

    public function circle() {
        return $this->belongsTo(Circle::class);
    }

    public function students() {
        return $this->hasMany(User::class);
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'teacher_courses', 'teacher_id', 'course_id');
    }
    public function exams()
    {
        return $this->hasMany(Exam::class, 'teacher_id');
    }
    public function activities()
{
    return $this->hasMany(Activity::class, 'teacher_id');
}



}
