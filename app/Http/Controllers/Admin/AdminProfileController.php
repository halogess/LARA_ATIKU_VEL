<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;
use Illuminate\Support\Facades\Session;

use App\Models\User;

class AdminProfileController extends Controller
{
    public function page_profile(){
        Session::put("page", "profile");
        return view("admin.profile");
    }

    public function do_profile(Request $request){

    }

}
