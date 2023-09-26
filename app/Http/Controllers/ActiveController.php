<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher = Auth::user(); // افترض أن المعلم مسجل دخوله
        $actives = $teacher->activities;

        return view('teachers.active', compact('actives'));
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
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        // استخراج معرف المعلم من الجلسة أو من أي مصدر آخر تستخدمه
        $teacherId = Auth::id(); // قم بتحديد معرف المعلم الحالي

        // تحقق إذا كان المستخدم مدير النظام
        $isAdmin = // قم بتحديد هل المستخدم مدير النظام أم لا؟

        // حفظ صورة النشاط الرئيسية
        $imagePath = $request->file('image')->store('activities', 'public');

        // تحقق من حالة النشاط
        $status = $isAdmin ? $request->input('status', 'مرفوض') : 'مرفوض';

        $activity = Activity::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'teacher_id' => $teacherId, // تعيين معرف المعلم الحالي
            'status' => $status, // تعيين حالة النشاط
        ]);

        // حفظ الصور الإضافية
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('activities', 'public');
                $activity->images()->create(['image_path' => $imagePath]);
            }
        }

        return redirect()
            ->route('teacher.active.index')
            ->with('msg', 'تم إضافة النشاط بنجاح')
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
        //
    }
}
