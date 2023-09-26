<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stage;
use Illuminate\Http\Request;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stages = Stage::latest()->paginate(10);
        return view('admins.stage.index',compact('stages'));
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
        'name' => 'required|unique:stages', // تحقق من الاسم باستخدام الجدول stages
        'name_teacher' => 'required'
    ]);

    Stage::create([
        'name' => $request->name,
        'name_teacher' => $request->name_teacher,
    ]);

    return redirect()
        ->route('admin.stage.index')
        ->with('msg', 'تم إضافة مرحلة بنجاح')
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
        $stage =Stage::find($id);
        return view('admins.stage.edit',compact('stage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $stage =Stage::find($id);
               $stage->update([
                       'name'=>$request->name,
                       'name_teacher'=>$request->name_teacher,

               ]);

               return redirect()
               ->route('admin.stage.index')
               ->with('msg','تم تحديث المرحلة بنجاح')
               ->with('type','info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stage = Stage::find($id);

        if ($stage) {
            if ($stage->circles->isEmpty()) { // تحقق ما إذا كانت هناك حلقات مرتبطة بالمرحلة
                $stage->delete();
                return redirect()
                    ->route('admin.stage.index')
                    ->with('msg', 'تم حذف المرحلة بنجاح')
                    ->with('type', 'warning');
            } else {
                return redirect()
                    ->route('admin.stage.index')
                    ->with('msg', 'لا يمكن حذف المرحلة لوجود حلقات مرتبطة بها')
                    ->with('type', 'error');
            }
        }
    }


}
