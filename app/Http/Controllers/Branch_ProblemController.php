<?php

namespace App\Http\Controllers;

use App\Models\AdminProblem;
use App\Models\branch;
use App\Models\ManagerProblem;
use App\Models\User;
use App\Notifications\AdminProblems;
use App\Notifications\MangerProblem;
use App\Notifications\MangerProblems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class Branch_ProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
         $this->middleware('permission:مشكلات المدير', ['only' => ['index','edit','asRead']]);
       
    }
    public function index()
    {
        $problems=ManagerProblem::orderBy('created_at', 'desc')->get();
        return view('MangerProblem',compact('problems'));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $request->validate([
            'content'=>'required'
        ],[
            'content.required'=>'هذا الحقل مطوب'
        ]);
        $problem=ManagerProblem::create([
            'content'=>$request->content,
            'user_id'=>Auth::user()->id,
            'branch_id'=>$request->branch_id

        ]);
        if($problem){
        $branch=branch::find($request->branch_id);
         /*  notification by database */
         $users=User::find($branch->user_id);
        Notification::send($users,new MangerProblems(Auth::user()->id,$request->content,$problem->id));


            toastr()->success('تم الارسال بنجاح سوف يتم الرد عليك من خلال الأيميل الخاص بك ' );
        }
            return redirect()->route('branches.show',$request->branch_id);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        return view('branch_problem',compact('id'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mark all as read
        $user=User::find(auth()->user()->id);
        //$user=auth()->user();
        //return $user;
        foreach($user->unreadNotifications as $notifications)
        {
                    $notifications->markAsRead();
        }
        DB::table('notifications')->where('read_at','!=',Null)->delete();

        return redirect('branch_problem');
    }

    public function asRead($id){
        //mark one notification as read
        $problem_id=ManagerProblem::findorfail($id);
        //get id of notification
        $notification_id=DB::table('notifications')->where('data->problem_id',$id)->where('notifiable_id',auth()->user()->id)->pluck('id');
        //update value of read_at
        //    return $notification_id;
        DB::table('notifications')->where('id',$notification_id)->update(['read_at'=>now()]);   
        DB::table('notifications')->where('read_at','!=',Null)->delete();
  
        return redirect('branch_problem#'.$id);
    }

    
}
