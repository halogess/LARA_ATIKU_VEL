<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Chat;
use App\Models\User;
use App\Models\Pembeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    public function doChat()
    {
        $userID = Auth::id();
        $chat = Chat::where('id_pembeli', $userID)->get();

        return view('chat', compact('chat'));

    }
    public function loadChat()
    {
        $userID = Auth::id();
        $chat = Chat::where('id_pembeli', $userID)->get();

        return view('isiChat', compact('chat'));
    }



    public function kirimChat(Request $request)
    {
        $userID = Auth::id();
        $request->validate([
            'inputChat' => 'required',
        ]);

        $chat = [];
        $newChat = new Chat();
        $newChat->id = Chat::all()->count() + 1;
        $newChat->chat_content = $request->input('inputChat');
        $newChat->id_pembeli = $userID;
        $newChat->id_admin = "mstr";
        $newChat->pengirim = "user";
        $newChat->save();
        array_push($chat, $newChat);
        return ;

    }

    public function loadChatAdmin(Request $request){
        $chat = Chat::where("id_pembeli", $request->id_pembeli)->get();
        $view = view("admin.isiChat", compact("chat"));
        return $view;
    }

    public function doChatAdmin()
    {
        $adminID = session('user_id');
        $chat = Chat::all();
        $namaUsers = User::where('id_user', 'LIKE', '%P%')->get();

        return view("admin.chat", compact('chat', 'namaUsers'));
    }

    public function showChat(Request $request)
    {
        $adminID = session('user_id');
        $userID = $request->input('btnUser');
        session(['id_pembeli' => $userID]);
        $namaUsers = User::where('id_user', 'LIKE', '%P%')->get();

        $chat = Chat::where('id_pembeli', $userID)->get();

        return view('admin.chat', compact('chat', 'namaUsers'));
    }
    public function sendChat(Request $request)
    {
        $adminID = session('user_id');
        $id_pembeli = session('id_pembeli');

        $input = [
            'chat_content' => $request->input('textChat'),
            'id_admin' => $adminID,
            'id_pembeli' => $id_pembeli,
            'pengirim' =>'admin'
        ];

        $newChat = DB::table('serverchat')->insertGetId($input);

        $chat = DB::table('serverchat')->where('id', $newChat)->first();
        return Response::json(['chat_content' => $chat->chat_content]);
    }
}
