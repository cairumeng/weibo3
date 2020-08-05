<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use App\Mail\signUpConfirmation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['create', 'store', 'show', 'activate']]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->email)
        ]);

        Mail::to($user)->send(new signUpConfirmation($user));

        session()->flash('success', 'You have created your account!');
        return back();
    }

    public function activate(User $user, Request $request)
    {
        if ($user->activation_token === $request->token) {
            $user->activated = true;
            $user->activation_token = null;
            $user->save();
            Auth::login($user);
            session()->flash('success', 'You have activated your account!');
            return redirect()->intended(route('home'));
        }
    }
}
