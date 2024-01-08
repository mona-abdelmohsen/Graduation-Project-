<?php

namespace App\Http\Controllers;

use App\Models\region;
use App\Models\branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
         $this->middleware('permission:المناطق', ['only' => ['index','store','create','show','edit','update','destroy']]);
        
    }
    public function index()
    {
        $branches = branch::all();
        $regions = region::all();
        return view('regions.region', compact('branches', 'regions'));
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
            'name' => 'required|unique:regions',
            'branch_id' => 'required'
        ],
        [
            'name.required'=>'ادخل اسم المنطقة',
            'name.unique'=>'اسم هذه المنطقة موجود مسبقا',
            'branch_id.required'=>'ادخل الفرع التابع له هذه المنطقة',
        ]);
        region::create([
            'name' => $request->name,
            'branch_id' => $request->branch_id,
        ]);

        toastr()->success('تم إضافة البيانات بنجاح');

        return back();
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|unique:regions,name,'.$id,
            'branch_id' => 'required'
        ],
        [
            'name.required'=>'ادخل اسم المنطقة',
            'name.unique'=>'اسم هذه المنطقة موجود مسبقا',
            'branch_id.required'=>'ادخل الفرع التابع له هذه المنطقة',
       ]);

        $region = region::find($id);
        $region->update([
            'name' => $request->name,
            'branch_id' => $request->branch_id,
        ]);

        toastr()->success('تم تحديث البيانات بنجاح');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request , $id)
    {
        $region = region::find($request->id);
        $region->delete();

     toastr()->success('تم حذف البيانات بنجاح');

        return redirect('regions');
    }
}
