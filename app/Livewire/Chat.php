<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{
    public $content;
    public $id;
    public $messages;
    public $importance = 0;
    public $replyContent;
    public $message_id;


    public function resetFields()
    {
     $this->id ="";

    }

    public function render()
    {
        $user = Auth::user();

        $this->messages = Message::where('teams_id', $user->currentTeam->id)
            ->with('replies') 
            ->orderBy('created_at', 'desc')
            ->get();
        return view('livewire.chat');
    }

    // Message
    public function createMessage()
    {
        $user = Auth::user();
        Message::create([
            'teams_id' => $user->currentTeam->id,
            'user_id' => $user->id,
            'content' => $this->content,
            'important' => $this->importance
        ]);
    
        $this->resetFields();
    }
    
    public function deleteMessage($id)
    {
        try {
            $message = Message::find($id);
            $message->replies()->delete();
            $message->delete();
    
            session()->flash('success', "Post Deleted Successfully!!");
        } catch (\Exception $e) {
            session()->flash('error', "Something went wrong!!");
        }
    }

    //Reply
    public function createReplyMessage($id)
    {
        $originalMessage = Message::findOrFail($id);

        $user = Auth::user();
        Reply::create([
            'teams_id' => $user->currentTeam->id,
            'user_id' => $user->id,
            'message_id'=> $originalMessage->id,
            'content' => $this->replyContent,
        ]);
        $this->resetFields();
    }
    

    public function deleteReplyMessage($id)
    {
        try{
            Reply::find($id)->delete();
            session()->flash('success',"Post Deleted Successfully!!");
        }catch(\Exception $e){
            session()->flash('error',"Something goes wrong!!");
        }
    }
}
