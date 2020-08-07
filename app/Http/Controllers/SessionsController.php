<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['only' => ['create']]);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            session()->flash('success', 'You have logged in!');
            return redirect()->intended(route('home'));
        } else {
            return back()->withErrors([
                'email' => 'your email or password is not correct',
                'modal' => 'loginModal'
            ]);
        }
    }

    public function destroy(User $user)
    {
        Auth::logout();
        session()->flash('success', 'You have logged out!');
        return back();
    }
}
