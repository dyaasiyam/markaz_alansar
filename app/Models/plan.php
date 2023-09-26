<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
{
    return $this->belongsTo(User::class);
}
public function courses()
{
    return $this->belongsToMany(Course::class, 'course_plan', 'plan_id', 'course_id');
}


}
