<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use App\Models\Conversation;
use App\Models\CustomerMessage;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::orderBy("created_at", "DESC");
        if (request()->get("mesaj")) {
            $messages = $messages->where("title", "LIKE", "%" . request()->get("mesaj") . "%");
        }
        $messages = $messages->orderBy("created_at", "DESC")->paginate(16);

        return view("admin.notification-management.messages", compact("messages"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Message::find($id)->delete();
        return back();
    }

    public function customerMessages(Request $request)
    {
        $conversations = Conversation::where("receiver_id", $request->user()->id)->orderBy("last_time_message", "DESC")->get();
        return view("admin.notification-management.customer-messages", compact("conversations"));
    }

    public function createMessage(Request $request, $conversationId)
    {
        $conversation = Conversation::find($conversationId);
        $message = $request->user()->messages()->create([
            "conversation_id" => $conversation->id,
            "receiver_id" => $conversation->sender_id,
            "body" => $request->body,
        ]);
        DB::table("customer_messages")->where("receiver_id", $request->user()->id)->update([
            "read" => 1,
        ]);
        return response(["message" => $message, "conversation" => $conversation]);
    }

    public function message(Request $request, $conversationId)
    {
        $conversations = $request->user()->conversations()->orderBy("last_time_message", "DESC")->get();
        $messages = MessageResource::collection(CustomerMessage::with("conversation", "sender", "receiver")->where("conversation_id", $conversationId)->get());
        $conversation = Conversation::with("sender", "receiver")->find($conversationId);
        DB::table("customer_messages")->where("receiver_id", $request->user()->id)->update([
            "read" => 1,
        ]);
        return response(["conversations" => $conversations, "messages" => $messages, "conversation" => $conversation]);
    }
}
