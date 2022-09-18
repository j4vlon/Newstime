<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    # Get the login blade
    public function GetLogin()
    {
        if (Auth::check()) {
            redirect()->intended(route('profile'));
        }
        return view('auth.login');
    }
    # Function for login user
    public function PostLogin(LoginRequest $request)
    {
        $formFields = $request->only(['login', 'password']);
        if (Auth::attempt($formFields)) {
            return redirect()->intended(route('profile'));
        }
        return redirect(route('auth.signin'))->withErrors([
            'login' => 'Не удалось авторизоваться'
        ]);
    }


    # Get the registration view 
    public function GetSignup()
    {
        if (Auth::check()) {
            return view('users.user');
        }
        return view('auth.register');
    }
    #  Function for registration user and create users data to the DB
    public function PostSignup(SignupRequest $request)
    {
        if (Auth::check()) {
            return redirect()->intended(route('profile'));
        }
        $user = User::create([
            'name' => $request->input('name'),
            'login' => $request->input('login'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'password_repeat' => bcrypt($request->input('password_repeat'))
        ]);

        if ($user) {
            Auth::login($user);
            return redirect(route('profile'));
        }
    }
}
