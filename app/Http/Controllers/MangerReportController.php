<?php

namespace App\Http\Controllers;

use App\Models\appartment;
use App\Models\branch;
use App\Models\region;
use Illuminate\Http\Request;

class MangerReportController extends Controller
{


    function __construct()
    {
         $this->middleware('permission:تقارير المدير', ['only' => ['index','store']]);

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $manager_id=auth()->user()->id;
        $branches=branch::where('user_id',$manager_id)->get();
        return view('reports.manger_reports',compact('branches'));

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
        // return $request;
        $request->validate([
            'branch_id' => 'required:appartments',
        ], ['branch_id.required' => 'هذا الحقل مطلوب!!']);

        if($request->branch_id && $request->region_id && $request->from_date == "" && $request->to_date == "")
        {
            if($request->status == "الكل")
            {
                $appartments = appartment::where('region_id',$request->region_id)->get();
            }
            else
            {
                $appartments = appartment::where('status', $request->status)->where('region_id',$request->region_id)->get();
            }
            // $region_id_app = $request->region_id;
            $regions = region::where('id', $request->region_id)->get();
            $branches = branch::where('id', $request->branch_id)->get();
            return view('reports.manger_reports', compact('regions', 'branches', 'appartments'));

        }
        else {
            $from_date = date($request->from_date);
            $to_date = date($request->to_date);
            $regions = region::where('id', $request->region_id)->get();
            $branches = branch::where('id', $request->branch_id)->get();

             //$appartments_with_date
            $appartments = appartment::whereBetween('created_at',[$from_date, $to_date])->where('status', 'لم تسكن')->where('region_id',$request->region_id)->get();
            return view('reports.manger_reports', compact('regions', 'branches', 'appartments', 'from_date', 'to_date'));
        }
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
