<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    function index() {
        $students =Auth::user();
        $numberOfCourses = $students->courses()->count(); //
        $exams = $students->exams()->count(); //
        return view('students.home' ,compact('numberOfCourses','exams'));

    }
    function courses()  {
        $students =Auth::user();
        $numberOfCourses = $students->courses()->get(); //
        return view('students.courses' ,compact('numberOfCourses'));
    }
    function about()  {
        $students =Auth::user();
        $Courses = $students->courses()->get(); //

        return view('students.about',compact('Courses','students'));

    }
    public function edit($id) {
        $student = User::find($id); // جلب بيانات الطالب
        return view('students.edit', compact('student'));
    }
    // StudentController.php

    public function update(Request $request, $id) {
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
            'image' => $img_name, // تحديث اسم الصورة إذا تم تحميل صورة جديدة أو استخدام الصورة الحالية
        ]);


        return redirect()
            ->route('student.about')
            ->with('msg', 'تم تحديث معلومات المستخدم بنجاح')
            ->with('type', 'info');
    }

    public function showStudentAttendanceDetails()
    {
        $student = Auth::user(); // الطالب المسجل دخول

        $attendanceData = $student->attendances()->latest()->paginate(30); // تفاصيل الحضور والغياب

        return view('students.show_attendance', compact('student', 'attendanceData'));
    }














    function profile_password()  {
        return view('students.profile_password');

    }
    function profile_password_update(Request $request) {
        // $request->validate([
        //     'old_password' => 'required',
        //     'password' => 'required|confirmed'
        // ]);
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

                return redirect('student/login');

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

}
