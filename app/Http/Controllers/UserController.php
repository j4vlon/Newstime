<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function GetProfile()
    {
        $user = Auth::user();
        return view('users.user', compact('user'));
    }
}
