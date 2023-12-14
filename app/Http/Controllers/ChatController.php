<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Chat;
use App\Models\Pembeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    public function doChat()
    {
        $chat = Chat::all();

        return view('chat', compact('chat'));
    }

    public function kirimChat(Request $request)
    {
        $input = [
            'chat_content' => $request->input('inputChat'),
            'id_admin' => 'A0001'
        ];

        DB::table('serverchat')->insert($input);

        return redirect('chat');
    }
}
