<?php

namespace App\Http\Controllers\Admin;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ActiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::with('images')->orderBy('created_at', 'desc')->paginate(5);
        return view('admins.active.index',compact('activities'));
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
    // public function store(Request $request)
    // {

    // $request->validate([
    //     'title' => 'required',
    //     'description' => 'required',
    //     'image' => 'required|image|mimes:jpeg,png,jpg,gif',
    //     'images.*' => 'image|mimes:jpeg,png,jpg,gif',
    // ]);

    // // حفظ صورة النشاط الرئيسية
    // $imagePath = $request->file('image')->store('activities', 'public');

    // $activity = Activity::create([
    //     'title' => $request->title,
    //     'description' => $request->description,
    //     'image' => $imagePath,
    // ]);

    // // حفظ الصور الإضافية
    // if ($request->hasFile('images')) {
    //     foreach ($request->file('images') as $image) {
    //         $imagePath = $image->store('activities', 'public');
    //         $activity->images()->create(['image_path' => $imagePath]);
    //     }
    // }
    // return redirect()
    // ->route('admin.active.index')
    // ->with('msg', 'تم إضافة النشاط بنجاح')
    // ->with('type', 'success');
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $activity = Activity::with('images')->findOrFail($id);
        return view('admins.active.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $activity = Activity::findOrFail($id);

        // return view('admins.active.edit',compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $activity = Activity::findOrFail($id);

        // // قم بتحديث البيانات الجديدة
        // $activity->update([
        //     'title' => $request->input('title'),
        //     'description' => $request->input('description'),
        //     // يمكنك تحديث المزيد من الحقول هنا
        // ]);

        // // تحديث الصورة الأساسية
        // if ($request->hasFile('image')) {
        //     Storage::delete('public/' . $activity->image);

        //     $img_name = rand() . time() . $request->file('image')->getClientOriginalName();
        //     $request->file('image')->storeAs('public', $img_name);
        //     $activity->update(['image' => $img_name]);
        // }

        // // تحديث الصور المتعددة
        // if ($request->hasFile('images')) {
        //     foreach ($activity->images as $oldImage) {
        //         Storage::delete('public/' . $oldImage->path);
        //         $oldImage->delete();
        //     }

        //     foreach ($request->file('images') as $newImage) {
        //         $img_name = rand() . time() . $newImage->getClientOriginalName();
        //         $newImage->storeAs('public', $img_name);
        //         // قم بإنشاء سجل جديد للصورة باستخدام العلاقة المناسبة في نموذج النشاط
        //         $activity->images()->create(['path' => $img_name]);
        //     }
        // }

        // return redirect()->route('admin.active.index')
        //                  ->with('msg', 'تم تحديث النشاط بنجاح')
        //                  ->with('type', 'info');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);

        // حذف الصور المتعلقة بالنشاط من المجلد
        foreach ($activity->images as $image) {
            Storage::delete('public/' . $image->image_path);
        }

        // حذف سجلات الصور المتعلقة من قاعدة البيانات
        $activity->images()->delete();

        // حذف سجل النشاط من قاعدة البيانات
        $activity->delete();

        return redirect()->route('admin.active.index')
            ->with('msg', 'تم حذف النشاط بنجاح')
            ->with('type', 'info');
    }

}
