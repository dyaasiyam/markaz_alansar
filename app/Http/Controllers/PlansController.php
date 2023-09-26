<?php

namespace App\Http\Controllers;

use App\Models\plan;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();

        $teacherId = Auth::user()->id;
        $plans = plan::where('teacher_id', $teacherId)
        ->latest()
        ->get();

        $students = User::where('teacher_id', $teacherId)
        ->with('parent', 'stage', 'circle')
        ->get();
        return view('teachers.plans.index', compact('students','plans','courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    function plan_status($planId,  $status){
        plan::find($planId)->update([
            'status' =>$status
        ]);
        return redirect()->back();

    }
    // public function plan_status($planId, $status)
    // {
    //     $plan = Plan::find($planId);

    //     if (!$plan) {
    //         // يمكنك إضافة منطق إضافي هنا في حالة عدم العثور على الخطة
    //         return redirect()->back()->with('error', 'الخطة غير موجودة.');
    //     }

    //     $plan->status = $status;
    //     $plan->save();

    //     return redirect()->back()->with('success', 'تم تحديث حالة الخطة بنجاح.');
    // }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'month' => 'required|numeric|between:1,12',
            'to' => 'nullable|integer',
            'for' => 'nullable|integer',
            'to_r' => 'nullable|integer',
            'for_r' => 'nullable|integer',
            'course_ids' => 'nullable|array',
        ]);

        // استخراج معرف المعلم من الجلسة أو المصدر المناسب
        $teacherId = Auth::user()->id; // افترض أن هذا هو معرف المعلم الحالي

        $plan = new plan();
        $plan->user_id = $request->input('user_id');
        $plan->teacher_id = $teacherId; // تعيين معرف المعلم
        $plan->month = $request->input('month');
        $plan->to = $request->input('to');
        $plan->to_r = $request->input('to_r');
        $plan->for = $request->input('for');
        $plan->for_r = $request->input('for_r');
        $plan->save();

        // الآن يمكنك إضافة الدورات إلى الخطة
        if ($request->has('course_ids')) {
            $plan->courses()->attach($request->input('course_ids'));
        }

        return redirect()
            ->route('teacher.plans.index')
            ->with('msg', 'تمت إضافة الخطة للطالب')
            ->with('type', 'success');
    }





    /**
     * Display the specified resource.
     */
    public function show() // عرض اختبارات الطالب المسجل
    {
        $student = Auth::user(); // الطالب المسجل دخول

        $plans = $student->plans()->latest()->paginate(30); // تفاصيل الحضور والغياب

        return view('students.showplans', compact('student', 'plans'));

    }
public function edit($id)
{
    // قم بجلب البيانات المتعلقة بالخطة باستخدام معرف الخطة
    $plan = Plan::findOrFail($id);
    $fromPage = $plan->to;
   $toPage = $plan->for;
   $fromPage_r = $plan->to_r;
   $toPage_r = $plan->for_r;
   // حساب عدد الصفحات
    $numberOfPages = $toPage - $fromPage ;
    $numberOfPages_r = $toPage_r - $fromPage_r ;

    // قم بإرسال البيانات إلى العرض
    return view('teachers.plans.show', compact('plan','numberOfPages','numberOfPages_r'));
}



    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // احتسب عدد الصفحات المنجزة من النموذج
        $count = $request->input('count');
        $count_r = $request->input('count_r');

        // احتسب عدد صفحات الخطة من الخطة المحدثة
        $plan = Plan::findOrFail($id);
        $numberOfPages = $plan->for - $plan->to ;
        $numberOfPages_r = $plan->for_r - $plan->to_r ;

        // احتسب نسبة الإنجاز
        $completionPercentage = ($count / $numberOfPages) * 100;
        $completionPercentage_r = ($count_r / $numberOfPages_r) * 100;


        // حدث الخطة في قاعدة البيانات
        $plan->count = $count;
        $plan->count_r = $count_r;
        $plan->completionPercentage = $completionPercentage;
        $plan->completionPercentage_r = $completionPercentage_r;

        $plan->save();

        // حدث النسبة في العرض
        return view('teachers.plans.show', [
            'plan' => $plan,
            'numberOfPages' => $numberOfPages,
            'numberOfPages_r' => $numberOfPages_r,
            'completionPercentage' => $completionPercentage,
            'completionPercentage_r' => $completionPercentage_r,
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    function show_plan($id){
        $plan = Plan::findOrFail($id);
        $fromPage = $plan->to;
   $toPage = $plan->for;
   $fromPage_r = $plan->to_r;
   $toPage_r = $plan->for_r;
   // حساب عدد الصفحات
    $numberOfPages = $toPage - $fromPage ;
    $numberOfPages_r = $toPage_r - $fromPage_r ;

        return view('students.show_plan', compact('plan','numberOfPages','numberOfPages_r'));


    }
}
