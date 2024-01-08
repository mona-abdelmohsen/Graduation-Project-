<?php

namespace App\Http\Controllers;

use App\Models\appartment;
use App\Models\branch;
use App\Models\picture;
use App\Models\post;
use App\Models\region;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
         $this->middleware('permission:الفروع', ['only' => ['index','store','create','edit','update','destroy']]);
       
    }
    public function index()
    {
        $branches = branch::all();
        $mangers=User::where('roles_name','مدير')->get();
        return view('branches.branches', compact('branches','mangers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
                'name' => 'required|unique:branches',
                'user_id' => 'required'
            ]);
        branch::create([
            'name'=>$request->name,
            'user_id'=>$request->user_id,
        ]);
        toastr()->success('تم إضافة البيانات بنجاح');

        return back();
    }

    /**
     * Display the specified resource.
     */
    /////branch//////////////
    public function show($id)
    {
        
        $Branch= branch::where('id', $id)->first();
        $regions=region::where('branch_id', $id)->get();
        $posts = post::where('branch_id', $id)->whereHas('Appartment', function (Builder $query) {
            $query->where('room_num', '>', 0);
        })
        ->orderBy('updated_at', 'desc')
        ->get();
        // $posts=post::where('branch_id', $id)->orderBy('created_at', 'desc')->get();
        $picture=picture::all();
        $branches=branch::all();
        return view('branches.branch',compact('Branch', 'regions','posts','picture','branches'));
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
    public function update(Request $request, $dd)
    {
         
        $request->validate([
            'name' => 'required|unique:branches,name,'. $request->id,
            'user_id' => 'required'
        ]);
         

        $branch = branch::findOrFail($request->id);
        $branch->update([
            'name'=>$request->name,
            'user_id'=>$request->user_id,
        ]);
        toastr()->success('تم تعديل البيانات بنجاح');
        return back();
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
         
        $branch = branch::findOrFail($request->id)->delete();
         
        toastr()->success('تم حذف البيانات بنجاح');

        return back();
   
    }

}
