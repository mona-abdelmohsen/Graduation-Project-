<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\PostNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostNotificationController extends Controller
{
    function __construct()
    {
        //  $this->middleware('permission:مستخدم', ['only' => ['show','edit']]);

    }

    public function show($id)
    {
        //mark one notification as read
        $pots_id=post::findorfail($id);
        //get id of notification
        $notification_id=DB::table('notifications')->where('data->post_id',$id)->where('notifiable_id',auth()->user()->id)->pluck('id');
        //update value of read_at
        //    return $notification_id;
        DB::table('notifications')->where('id',$notification_id)->update(['read_at'=>now()]);
        DB::table('notifications')->where('read_at','!=',Null)->delete();

        return redirect('home#'.$id);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($str)
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

        return redirect('home');

    }


}
