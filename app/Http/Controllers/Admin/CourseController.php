<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses=Course::latest()->paginate(10);
        return view('admins.course.index' ,compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:stages', // تحقق من الاسم باستخدام الجدول stages
        ]);

        Course::create([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('admin.course.index')
            ->with('msg', 'تم إضافة الدورة بنجاح')
            ->with('type', 'success');

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
    public function edit(Course $course)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);

        if ($course) {
            // افحص ما إذا كانت الدورة مرتبطة بمعلم أو طالب
            if ($course->teacher_id || $course->students()->count() > 0) {
                return redirect()->route('admin.course.index')
                    ->with('msg', 'لا يمكن حذف الدورة لأنها مرتبطة بمعلم أو طلاب')
                    ->with('type', 'error');
            }

            // إذا لم تكن مرتبطة، قم بحذف الدورة
            $course->delete();

            return redirect()->route('admin.course.index')
                ->with('msg', 'تم حذف الدورة')
                ->with('type', 'warning');
        }

        return redirect()->route('admin.course.index')
            ->with('msg', 'الدورة غير موجودة')
            ->with('type', 'error');
    }

}
