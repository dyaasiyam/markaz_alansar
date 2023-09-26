<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ParentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = User::find(auth()->id()); // استبدل هذا بالطريقة المناسبة للحصول على بيانات الطالب المسجل
        $parent = $student->parent;

        return view('students.parent', compact('student', 'parent'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = User::find(auth()->id()); // استبدل هذا بالطريقة المناسبة للحصول على بيانات الطالب المسجل
        $parent = $student->parent;
        return view('students.edit_parent',compact('student', 'parent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = User::find(auth()->id()); // استبدل هذا بالطريقة المناسبة للحصول على بيانات الطالب المسجل
        $parent = $student->parent;

        // تحديث بيانات الوالد باستخدام البيانات المُرسلة من النموذج
        $parent->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'id_number' => $request->input('id_number'),
            'jobs' => $request->input('jobs'),
            'live' => $request->input('live'),
            'bio' => $request->input('bio'),
        ]);
        return redirect()
        ->route('student.parent.index', $id)
        ->with('msg', 'تم تحديث بيانات ولي الأمر  بنجاح')
        ->with('type', 'info');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
