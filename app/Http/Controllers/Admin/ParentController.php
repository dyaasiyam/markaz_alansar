<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Parents;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parents=Parents::latest()->paginate();
        return view('admins.parent.index',compact('parents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents=Parents::latest()->paginate();

        return view('admins.parent.create',compact('parents'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'nullable',

        ]);

        $parent = Parents::create([
            'name' => $request->name,
            'phone' => $request->phone,

        ]);

        return redirect()
        ->route('admin.parent.create')
        ->with('msg','تم اضافة أب بنجاح')
        ->with('type','success');
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
        $parent =Parents::find($id);
        $parent->delete();
        return redirect()
        ->route('admin.parent.create')
        ->with('msg','تم حذف الأب بنجاح')
        ->with('type','warning');
    }
}
