<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Stage;
use App\Models\Circle;
use App\Models\Course;
use App\Models\Parents;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Notifications\StudentAddedNotification;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $stages = Stage::all(); // استبدل Stage بالنموذج الخاص بالمراحل
        $selectedStageId = $request->query('stage_id');

        $query = User::query(); // استبدل User بالنموذج الخاص بالطلاب

        if ($selectedStageId) {
            $query->where('stage_id', $selectedStageId);
        }

        $students = $query->paginate(10); // عرض 10 طلاب في كل صفحة

        return view('admins.student.index', ['students' => $students, 'stages' => $stages]);
    }







    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stages = Stage::all(); // احتمالًا تحتاج إلى استدعاء النموذج المناسب هنا
        $courses = Course::all(); // احتمالًا تحتاج إلى استدعاء النموذج المناسب هنا
        $parents = Parents::all(); // جلب قائمة الأولياء
        $teachers = Teacher::all(); // جلب قائمة المعلمي

        return view('admins.student.create', compact('stages', 'courses','parents','teachers'));
    }
    public function getTeachers(Request $request)
{
    $stageId = $request->input('stage_id');
    $circleId = $request->input('circle_id');

    $teachers = Teacher::where('stage_id', $stageId)
        ->where('circle_id', $circleId)
        ->get();

    return response()->json($teachers);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'password' => 'required',
            // 'date' => 'required',
            'exams' => 'required|numeric',
            'exam' => 'required|numeric',
            'parts' => 'required|numeric',
            'image' => 'nullable',
            'stage_id' => 'required',
            'circle_id' => 'required',
            'course_ids' => 'required|array',
            'parent_id' => 'required',
            'teacher_id' => 'required', // تأكد من وجود هذا الحقل
        ]);

        $student = User::create([
            'name' => $request->name,
            'number' => $request->number,
            'password' => Hash::make($request->password),
            // 'date' => $request->date,
            'exams' => $request->exams,
            'exam' => $request->exam,
            'parts' => $request->parts,
            'stage_id' => $request->stage_id,
            'circle_id' => $request->circle_id,
            'parent_id' => $request->parent_id,
            'teacher_id' => $request->teacher_id,
        ]);

        $student->courses()->sync($request->course_ids);

        // // العثور على المعلم باستخدام teacher_id وإرسال الإشعار
        // $teacher = User::find($request->teacher_id);
        // if ($teacher) {
        //     $teacher->notify(new StudentAddedNotification($student->name));
        // }

        return redirect()
            ->route('admin.student.index')
            ->with('msg', 'تم اضافة الطالب بنجاح')
            ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $student)
    {
        // استعلام لاسترجاع معلومات الحلقة والمرحلة والمعلم والدورات
        $studentWithRelations = $student->load('circle', 'stage', 'teacher', 'courses');

        return view('admins.student.show', ['student' => $studentWithRelations]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stages = Stage::all();
        $courses = Course::all();
        $circles = Circle::all();
        $teachers = Teacher::all();
        $parents = Parents::all();
        $students = User::find($id);

        // Assuming you have retrieved the old values for each field
        $selectedStage = $students->stage_id;
        $selectedCircle = $students->circle_id;
        $selectedParent = $students->parent_id;
        $selectedTeacher = $students->teacher_id;

        return view('admins.student.edit', compact('teachers', 'stages', 'courses', 'circles', 'students', 'parents', 'selectedStage', 'selectedCircle', 'selectedParent', 'selectedTeacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // الحصول على الطالب المحدث من قاعدة البيانات
        $student = User::find($id);

        // تحديث الحقول بناءً على البيانات المرسلة في الطلب
        $student->name = $request->input('name');
        $student->date = $request->input('date');
        $student->exams = $request->input('exams');
        $student->exam = $request->input('exam');
        $student->parts = $request->input('parts');
        $student->stage_id = $request->input('stage_id');
        $student->circle_id = $request->input('circle_id');
        $student->parent_id = $request->input('parent_id');
        $student->teacher_id = $request->input('teacher_id');

        // حفظ البيانات المحدثة
        $student->save();

        // تحديث الدورات المرتبطة بالطالب
        $selectedCourses = $request->input('course_ids', []);
        $student->courses()->sync($selectedCourses);

        // إعادة توجيه بعد الانتهاء إلى صفحة العرض أو أي صفحة أخرى
        return redirect()->route('admin.student.show', $id)->with('success', 'تم تحديث بيانات الطالب بنجاح.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = User::find($id);

        // حذف السجلات المرتبطة في جدول course_user
        $student->courses()->detach();

        // حذف الصورة المرتبطة بالطالب
        File::delete(public_path('images/' . $student->image));

        // حذف الطالب
        $student->delete();

        return redirect()
        ->route('admin.student.index')
        ->with('msg','تم تحديث الطالب بنجاح')
        ->with('type','info');
    }

}
