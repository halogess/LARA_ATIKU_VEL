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
        $userID = session('user_id');
        $chat = Chat::where('id_pembeli', $userID)->get();

        return view('chat', compact('chat'));
    }

    public function kirimChat(Request $request)
    {
        $userID = session('user_id');

        $input = [
            'chat_content' => $request->input('inputChat'),
            'id_admin' => 'A0001',
            'id_pembeli' =>  $userID,
            'pengirim' =>'user'
        ];

        $newChat = DB::table('serverchat')->insertGetId($input);

        $chat = DB::table('serverchat')->where('id', $newChat)->first();
        return Response::json(['chat_content' => $chat->chat_content]);
    }


    public function doChatAdmin()
    {
        $userID = session('user_id');
        $chat = Chat::all();
        $namaUsers = User::where('id_user', 'LIKE', '%P%')->get();

        return view("admin.chat", compact('chat', 'namaUsers'));
    }

    // public function kirimChatAdmin(Request $request)
    // {
    //     $userID = session('user_id');
    //     $adminID = $request->input('btnUser');

    //     $input = [
    //         'chat_content' => $request->input('inputChat'),
    //         'id_admin' => $adminID,
    //         'id_pembeli' =>  $userID,
    //         'pengirim' =>'user'
    //     ];

    //     $newChat = DB::table('serverchat')->insertGetId($input);

    //     $chat = DB::table('serverchat')->where('id', $newChat)->first();
    //     return Response::json(['chat_content' => $chat->chat_content]);
    // }

    public function kirimChatAdmin(Request $request)
    {
        $userID = session('user_id');
        $adminID = $request->input('btnUser');

        $chats = Chat::where('id_pembeli', $userID)->get();

        return view('admin.chat', compact('chats'));
    }
}
