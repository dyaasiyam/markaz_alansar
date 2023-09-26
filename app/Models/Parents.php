<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function circles()
    {
        return $this->hasMany(Circle::class);
    }
    public function students()
    {
        return $this->hasMany(User::class);
    }
    


}
