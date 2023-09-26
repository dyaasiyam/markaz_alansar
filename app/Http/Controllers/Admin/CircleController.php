<?php

namespace App\Http\Controllers\Admin;

use App\Models\Stage;
use App\Models\Circle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class CircleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stages = Stage::select('id', 'name')->get();

        $circles=Circle::latest()->paginate(10);
        return view('admins.circle.index',compact('circles','stages'));
    }
    function profile()  {
        return view('admins.profile');

    }
    public function profile_update(Request $request){
        $user = Auth::user();

        // dd($request->all());
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
            ->route('admin.admin.profile.profile')
            ->with('msg', 'تم تحديث معلومات المستخدم بنجاح')
            ->with('type', 'info');
    }
    function profile_password()  {
        return view('admins.profile_password');

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

                return redirect('admin/login');

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


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $stage = Stage::select('id', 'name')->get();
        // return view('admins.circle.index', compact('stage'));
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'name'=>'required',
            'stage_id'=>'required',
            ]);

                Circle::create([
                    'name'=>$request->name,
                    'stage_id'=> $request->stage_id,
                ]);
                // dd($request->all());
                return redirect()
                ->route('admin.circle.index')
                ->with('msg','تم إضافة المرحلة بنجاح')
                ->with('type','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Circle $circle)
    {
        $stages = Stage::select('id', 'name')->get();
        return view('admins.circle.edit',compact('circle','stages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'nullable',
            'stage_id' => 'nullable',
        ]);

        $circle = Circle::findOrFail($id);

        $circle->update([
            'name'=>$request->name,
            'stage_id'=>$request->stage_id,
        ]);

        return redirect()
        ->route('admin.circle.index')
        ->with('msg','تم تحديث المرحلة بنجاح')
        ->with('type','info');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $circle = Circle::findOrFail($id);

        $circle->delete();

        return redirect()->route('admin.circle.index')
            ->with('msg', 'تم حذف الحلقة بنجاح')
            ->with('type', 'warning');
    }

}
