<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Activity;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\AttendanceRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{

    function index() {
        $teacherId = Auth::user()->id; // افترض أن هذا هو معرف المعلم الحالي

        $totalGroupExams = User::where('teacher_id', $teacherId)->sum('exams');
        $totalIndividualExams = User::where('teacher_id', $teacherId)->sum('exam');

        return view('teachers.index', [
            'totalGroupExams' => $totalGroupExams,
            'totalIndividualExams' => $totalIndividualExams
        ]);
    }


function profile()  {//صفقحة معلومات المستخدم
    return view('teachers.editprofile');

}
public function profile_update(Request $request){//برمجة تجديث معلومات المستخذم

    $user = Auth::user();
    // dd($request->all());ظ
         // upload file
         $img_name = Auth::user()->image;

         if($request->hasFile('image')) {
            File::delete(public_path('images/'.$user->image));
             $img_name = rand() . time() . $request->file('image')->getClientOriginalName();
             $request->file('image')->move(public_path('images'), $img_name);
         }

    $user->update([
        'name' => $request->name,
        'phone' => $request->phone,
        'id_number' => $request->id_number,
        'image' => $img_name, // تحديث اسم الصورة إذا تم تحميل صورة جديدة أو استخدام الصورة الحالية
    ]);


    return redirect()
        ->route('teacher.teacher.profile.profile')
        ->with('msg', 'تم تحديث معلومات المستخدم بنجاح')
        ->with('type', 'info');

}

function profile_password()  {//عرض صفحة تغيير كلمة المرور

    return view('teachers.profile_password');

}
function profile_password_update(Request $request) {//تغيير كلمة المرور

    $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6'
        ]);

        if(!Hash::check($request->old_password, Auth::user()->password)) {
            $validator->after(function ($validator) {
                $validator->errors()->add(
                    'old_password', 'Old Password doesn\'t match'
                );
            });
        }


        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

    if(Hash::check($request->old_password, Auth::user()->password)) {

        if(!Hash::check($request->password, Auth::user()->password)) {

            $teacher = Auth::user();

            $teacher->update([
                'password' => bcrypt($request->password)
            ]);

            Auth::logout();

            return redirect('teacher/login');

        }else {

            return redirect()->back();
        }

    }else {

        // $validator->after(function ($validator) {
        //     $validator->errors()->add(
        //         'old_password', 'Old Password doesn\'t match'
        //     );
        // });

        return redirect()->back()->withInput()->withErrors($validator);
    }
}

function attendance(){//صفحة أخذ الحضور والغياب
    $teacherId = Auth::user()->id;

    $students = User::where('teacher_id', $teacherId)
                    ->with('parent', 'stage', 'circle')
                    ->get();
    return view('teachers.attendance',compact('students'));

}

function record(Request $request)
{
    $statuses = $request->input('status');

    $today = now()->toDateString(); // تاريخ اليوم الحالي

    foreach ($statuses as $studentId => $status) {
        // التحقق مما إذا تم بالفعل تسجيل الحضور والغياب لهذا اليوم للطالب
        $existingRecord = Attendance::where('user_id', $studentId)
            ->whereDate('date', $today)
            ->exists();

        if (!$existingRecord) {
            $attendance = new Attendance();
            $attendance->user_id = $studentId;
            $attendance->date = $today;
            $attendance->status = $status;
            $attendance->save();
        } else {
            // تخزين رسالة التنبيه في الجلسة
            return redirect()
            ->route('teacher.attendance')
            ->with('msg', 'تم أخذ الحضور والغياب مسبقاً لليوم')
            ->with('type', 'error');
        }
    }

    return redirect()
        ->route('teacher.attendance')
        ->with('msg', 'تم أخذ الحضور والغياب لهذا اليوم')
        ->with('type', 'success');
}
function show_attendance()  {//عرض الحضور والغياب للطلاب
    $teacherId = Auth::user()->id;

    $students = User::where('teacher_id', $teacherId)
                    ->with('parent', 'stage', 'circle')
                    ->get();
    return view('teachers.show_attendance',compact('students'));
}

public function showStudentAttendanceDetails($student_id)
{
    $student = User::findOrFail($student_id);

    // قم بجلب بيانات الحضور والغياب للطالب وقسمها على صفحات
    $attendanceData = $student->attendances()->latest()->paginate(30); // تفاصيل الحضور والغياب

    return view('teachers.show_single_student', compact('student', 'attendanceData'));
}






}
