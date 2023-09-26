<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Circle;
use App\Models\Course;
use App\Models\Parents;
use App\Models\Stage;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index() {
        $stu=User::count();
        $th=Teacher::count();
        $st=Stage::count();
        $ci=Circle::count();
        $ac=Activity::count();
        $co=Course::count();
        $exam = User::sum('exam');
        $exams = User::sum('exams');
        $pa = Parents::count();
            return view('admins.home',compact('stu','th','st','ci','ac','co','exam','exams','pa'));
    }

}
