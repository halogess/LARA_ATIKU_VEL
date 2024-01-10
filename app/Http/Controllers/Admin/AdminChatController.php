<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\User;

class AdminChatController extends Controller
{
    public function page_chat()
    {
        Session::put("page", "chat");
        if(!Session::has('chat_user')){
            Session::put("chat_user", "");
        }
        $param["pembeli"] = User::where("role", 0)->get();
        return view("admin.chat.chat", $param);
    }
    public function transChat(Request $request){
        Session::put("chat_user", $request->id);
        return redirect("admin/chat");
    }

    public function loadCustomers()
    {
        $pembeli = User::where("role", 0)->get();
        $newMessage = [];
        foreach ($pembeli as $p) {
            $newMessage[$p->id_user] = Chat::where("id_pembeli", $p->id_user)
                ->where("dibaca", 0)
                ->where("pengirim",'user')
                ->get()->count();
        }

        $param["pembeli"] = $pembeli;
        $param["newMessage"] = $newMessage;
        return view("admin.chat.isiCustomer", $param);
    }

    public function sendChat(Request $request)
    {
        $request->validate([
            'chat' => 'required'
        ]);

        $chat = [];
        $newChat = new Chat();
        $newChat->id = Chat::all()->count() + 1;
        $newChat->chat_content = $request->chat;
        $newChat->id_pembeli = Session::get("chat_user");
        $newChat->id_admin = Auth::user()->id_user;
        $newChat->pengirim = "admin";
        $newChat->save();
        array_push($chat, $newChat);
        return ;
    }

    public function loadChat()
    {
        $blmdibaca = Chat::where("id_pembeli", Session::get("chat_user"))->where("dibaca", 0)->get();
        foreach($blmdibaca as $b){
            $b->dibaca = 1;
            $b->save();
        }
        $chat = Chat::where("id_pembeli", Session::get("chat_user"))->get();
        $view = view("admin.chat.isiChat", compact("chat"));
        return $view;
    }

    public function showChat(Request $request)
    {
        Session::put("chat_user", $request->id_pembeli);
        return;
    }
}
