<?php

namespace App\Http\Controllers;

use App\Models\AdminProblem;
use App\Models\Problem;
use App\Models\User;
use App\Notifications\AdminProblems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\solveProlem;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class AdminProblemController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:مشكلات الأدمن', ['only' => ['index','show','edit']]);
       
    }
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $problems=AdminProblem::orderBy('created_at', 'desc')->get();
        return view('Adminproblem',compact('problems'));
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'first_name' => 'required',
        //     'last_name'=>'required',
        //     'email' => 'required',
        //     'content'=>'required',
        // ],[
        //     'first_name.required'=>'! ادخل الأسم الأول',
        //     'last_name.required'=>'! ادخل الأسم الثانى',
        //     'email.required'=>'!  ادخل البريد الألكترونى',
        //     'content.required'=>'! ادخل المشكلة التى تواجهك',

        // ]);

        $name=$request->first_name." ".$request->last_name;

        $problem=AdminProblem::create([
            'content'=>$request->content,
            'user_name'=>$name,
            'email'=>$request->email,
        ]);
         /*  notification by database */
         $users=User::where('roles_name','ادمن')->get();
         Notification::send($users,new AdminProblems($name,$request->email,$request->content,$problem->id));

        toastr()->success('تم الارسال بنجاح سوف يتم الرد عليك من خلال الأيميل الخاص بك ' );
         return back();
    }

    /**
     * Display the specified resource.
     */
  //mark one notification as read

    public function show($id)
    {
         //mark one notification as read
         $pots_id=AdminProblem::findorfail($id);
         //get id of notification
         $notification_id=DB::table('notifications')->where('data->problem_id',$id)->where('notifiable_id',auth()->user()->id)->pluck('id');
         //update value of read_at
         //    return $notification_id;

         DB::table('notifications')->where('id',$notification_id)->update(['read_at'=>now()]);   
         DB::table('notifications')->where('read_at','!=',Null)->delete();
  
         return redirect('AdminProblems#'.$id);
    }

    /**
     * Show the form for editing the specified resource.
     */

    //mark all as read

    public function edit($test)
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

        return redirect('AdminProblems');
    }
    public function send_to_mail(Request $request){

    $sender="أدمن";
     Mail::to($request->to)->send(new solveProlem($request->to,$request->message,$sender));
    toastr()->success('تم الأرسال');
     return back();
    }

    
    
}
