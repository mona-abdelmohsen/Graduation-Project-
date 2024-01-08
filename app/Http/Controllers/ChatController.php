<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {

        return view('chat.chat');

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //mark one notification as read
        $message_id=Chat::findorfail($id);
        //get id of notification
        $notification_id=DB::table('notifications')->where('data->message_id',$id)->where('notifiable_id',auth()->user()->id)->pluck('id');
        //update value of read_at
        //    return $notification_id;
        DB::table('notifications')->where('id',$notification_id)->update(['read_at'=>now()]);
        DB::table('notifications')->where('read_at','!=',Null)->delete();

        return redirect()->route('chat.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
