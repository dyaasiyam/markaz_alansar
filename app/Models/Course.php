<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_user', 'course_id', 'user_id');
    }
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'course_teacher');
    }
    // public function plans()
    // {
    //     return $this->belongsToMany(Plan::class);
    // }
    public function plans()
{
    return $this->belongsToMany(Plan::class, 'course_plan', 'course_id', 'plan_id');
}


}
