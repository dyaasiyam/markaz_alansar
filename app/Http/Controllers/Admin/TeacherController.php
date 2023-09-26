<?php

namespace App\Http\Controllers\Admin;

use App\Models\Stage;
use App\Models\Circle;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Activity;
use App\Mail\WelcomeTeacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers=Teacher::latest()->paginate(10);
        $stages = Stage::all();
        $courses = Course::all();
        return view('admins.teacher.index',compact('stages','courses','teachers'));
    }
    public function getCircles(Request $request)
{
    $stage_id = $request->input('stage_id');
    $circles = Circle::where('stage_id', $stage_id)->get();
    return response()->json($circles);
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stages = Stage::all();
        $courses = Course::all();
        return view('admins.teacher.create',compact('stages','courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //اضافة معلم
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'number' => 'required',
            // 'email' => 'required',
            'password' => 'required',
            'stage_id' => 'required',
            'circle_id' => 'required',
            'course_ids' => 'required|array',
        ]);
          ///رفع الملف
        //   $img_name=rand().time().$request->file('image')->getClientOriginalName();
        //   $request->file('image')->move(public_path('images'),$img_name);

        $teacher = Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'password' => Hash::make($request->password),
            'stage_id' => $request->stage_id,
            'circle_id' => $request->circle_id,
        ]);

        $teacher->courses()->sync($request->course_ids);
        $info =$request->only('name','number','password');
        Mail::to($request->email)->send(new WelcomeTeacher($info));


        return redirect()
        ->route('admin.teacher.index')
        ->with('msg','تم اضافة معلم بنجاح')
        ->with('type','success');

    }
    public function acceptActivity($id)
{
    $activity = Activity::find($id);
    if ($activity) {
        $activity->update(['status' => 'مقبول']);
    }
    return redirect()->back();
}

public function rejectActivity($id)
{
    $activity = Activity::find($id);
    if ($activity) {
        $activity->update(['status' => 'مرفوض']);
    }
    return redirect()->back();
}





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = Teacher::find($id);
        if (!$teacher) {
            return abort(404); // إذا لم يتم العثور على المدرس، عرض صفحة الخطأ 404
        }

        // استرجاع الدورات والحلقة والمرحلة المتعلقة بالمدرس هنا
        $courses = $teacher->courses; // افترض أن العلاقة بين المدرس والدورات تسمى "courses"
        $loop = $teacher->loop; // افترض أن العلاقة بين المدرس والحلقة تسمى "loop"
        $stage = $teacher->stage; // افترض أن العلاقة بين المدرس والمرحلة تسمى "stage"
        $students = $teacher->students;

        return view('admins.teacher.show', compact('teacher', 'courses', 'loop', 'stage','students'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stages = Stage::all();
        $courses = Course::all();
        $circles=Circle::all();
        $teacher = Teacher::find($id);
        return view('admins.teacher.edit', compact('teacher', 'stages', 'courses','circles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // تجاوز الصلاحيات والتحقق من وجود المعلم
        $teacher = Teacher::find($id);
        if (!$teacher) {
            return redirect()->route('admin.teacher.index')->with('error', 'المحفظ غير موجود.');
        }

        // التحقق من البيانات المُدخلة
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable',
            'id_number' => 'nullable',
            'stage_id' => 'required|exists:stages,id',
            'circle_id' => 'required|exists:circles,id',
            'course_ids' => 'required|array',
            'course_ids.*' => 'exists:courses,id',
        ]);

        // تحديث بيانات المعلم
        $teacher->name = $validatedData['name'];
        // $teacher->phone = $validatedData['phone'];
        // $teacher->id_number = $validatedData['id_number'];
        $teacher->stage_id = $validatedData['stage_id'];
        $teacher->circle_id = $validatedData['circle_id'];
        $teacher->save();

        // تحديث دورات المعلم
        $teacher->courses()->sync($validatedData['course_ids']);

        return redirect()
        ->route('admin.teacher.index')
        ->with('msg','تم تحديث المحفظ بنجاح')
        ->with('type','info');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher =Teacher::find($id);
        File::delete(public_path('images/'.$teacher->image));
        $teacher->delete();
        return redirect()
        ->route('admin.teacher.index')
        ->with('msg','تم حذف المحفظ بنجاح')
        ->with('type','warning');
    }
}
