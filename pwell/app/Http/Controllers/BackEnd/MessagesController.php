<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Messages\Reply;
use App\Mail\contact_us_reply;
use App\Models\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class MessagesController extends BackEndController
{
    public function __construct(Message $model)
    {
        parent::__construct($model);
    }

    public function replyMessage(Reply $request, $id){
        $user_message = Message::findOrFail($id);
        $admin_message = $request->message;

        Mail::send(new contact_us_reply($user_message, $admin_message));

        Session::flash('replied', 'Your Message has been sent');
        return redirect()->route('messages.edit', $user_message->id);






    }
}
