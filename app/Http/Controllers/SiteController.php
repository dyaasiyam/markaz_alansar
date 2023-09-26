<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;

use App\Models\Teacher;


class SiteController extends Controller
{
  function index()  {
    $st=User::count();
    $th=Teacher::count();
    $exam = User::sum('exam');
    $exams = User::sum('exams');
    $sum=$exams+$exam;

    return view('website.index',compact('st','th','sum'));

  }

  function teacher() {
    $teachers=Teacher::all();

    return view('website.teachers',compact('teachers'));

  }
  function active()  {
    $actives=Activity::latest()->paginate(6);
    return view('website.active', compact('actives'));

  }
  function actives_singles($id) {
    $active = Activity::find($id);
    return view('website.actives_singles', compact('active'));
}

}
