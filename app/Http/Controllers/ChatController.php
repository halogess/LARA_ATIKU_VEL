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
    //}

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
