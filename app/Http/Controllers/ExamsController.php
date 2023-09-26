<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $teacherId = Auth::user()->id;

    // استرجاع الاختبارات التي أنشأها المعلم الحالي
    $exams = Exam::where('teacher_id', $teacherId)
                 ->latest()
                 ->paginate(10);

    $students = User::where('teacher_id', $teacherId)
                    ->with('parent', 'stage', 'circle')
                    ->paginate(10);

    return view('teachers.sours.index', compact('students', 'exams'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //بدي كود الإضافة
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'exam_name' => 'required',
            'score' => 'required|numeric',
            'status' => 'required',
        ]);

        $teacherId = Auth::user()->id; // افترض أن هذا هو معرف المعلم الحالي

        $exam = new Exam();
        $exam->user_id = $request->input('user_id');
        $exam->teacher_id = $teacherId; // تعيين معرف المعلم
        $exam->exam_name = $request->input('exam_name');
        $exam->score = $request->input('score');
        $exam->status = $request->input('status');
        $exam->save();

        return redirect()
            ->route('teacher.exam.index')
            ->with('msg', 'تمت إضافة الاختبار بنجاح')
            ->with('type', 'success');
    }


    /**
     * Display the specified resource.
     */
    public function show() // عرض اختبارات الطالب المسجل
    {
        $student = Auth::user(); // الطالب المسجل دخول

        $exams = $student->exams()->latest()->paginate(30); // تفاصيل الحضور والغياب

        return view('students.showexam', compact('student', 'exams'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exam = Exam::findOrFail($id);

        $exam->delete();

        return redirect()->route('teacher.exam.index')
            ->with('msg', 'تم حذف الاختبار بنجاح')
            ->with('type', 'warning');
    }
}
