<?php

namespace App\Http\Livewire;

use App\Models\branch;
use Livewire\Component;
use App\Models\Chat;
use App\Models\User;
use App\Notifications\newMessage;
use Illuminate\Database\Eloquent\Builder ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;


class Chatt extends Component
{
    public $messageText;
    public $reciver_id;
    public $Text;
    public $searchTerm;
    public function render()
    {

        $chat_with = Chat::Where('reciver_id', Auth::user()->id)->distinct('sender_id','reciver_id')->get();

        if ($this->Text) {

            $messages = Chat::all()->sortBy('id');

             $reciver=User::where('id',$this->Text)->first();
            if ($this->searchTerm) {

                $searchTerm = $this->searchTerm . '%';
                $users = User::where('name', 'like', $searchTerm)->orWhere('roles_name', 'like', $searchTerm)->where('id','!=', Auth::user()->id)->get();

                return view('livewire.chatt', compact('users', 'messages', 'chat_with','reciver'));
            } else {

                return view('livewire.chatt', compact( 'messages', 'chat_with','reciver'));
            }
        }

        else {
            $error = true;

            if ($this->searchTerm) {

                $searchTerm = $this->searchTerm . '%';
                $users = User::where('name', 'like', $searchTerm)->orWhere('roles_name', 'like', $searchTerm)->where('id','!=', Auth::user()->id)->get();
                return view('livewire.chatt', compact('users', 'error', 'chat_with'));
            } else {
                return view('livewire.chatt', compact('error', 'chat_with'));
            }
        }
    }


    public function sendMessage()
    {
        $message = Chat::create([
            'sender_id' => Auth::user()->id,
            'reciver_id' => $this->Text,
            'message' => $this->messageText,
        ]);
        $reciver_id = User::where('id', $this->Text)->get() ;
        Notification::send($reciver_id,new newMessage($message->id,Auth::user()->id, $this->messageText,'message'));
        return $this->reset('messageText');
    }
    public function addTodo($id)
    {
        $this->Text = $id;

        $messages = Chat::Where('sender_id', Auth::user()->id)->Where('reciver_id', $this->Text)->get()->sortBy('id');
        // $to_user = User::where('id', $id)->first();
        // $this->reciver_id=$id;
        return view('livewire.chatt', compact('messages'));
    }
}
