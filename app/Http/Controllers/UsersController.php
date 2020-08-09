<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use App\Mail\signUpConfirmation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', $user);
    }

    public function update(User $user, Request $request)
    {
        $this->authorize('update', $user);
        $rule = [];
        $data = [];
        if ($request->password) {
            $rule = [
                'name' => 'required|max:50',
                'password' => 'required|confirmed|min:6'
            ];
            $data = [
                'name' => $request->name,
                'password' => bcrypt($request->password)
            ];
        } else {
            $rule = ['name' => 'required|max:50'];
            $data = ['name' => $request->name];
        }
        $request->validate($rule);
        $user->update($data);
        session()->flash('success', 'You have update your personal info!');
        return back();
    }

    public function uploadAvatar(Request $request, User $user)
    {
        $this->authorize('update', $user);
        $request->validate(['avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
        $avatar = $request->avatar;
        $avatarName = time() . '.' . $avatar->extension();
        Storage::putFileAs('images/avatars', $avatar, $avatarName, 'public');
        $path = Storage::url('images/avatars/' . $avatarName);
        $user->update(['avatar' => $path]);
        return $path;
    }

    public function show(User $user)
    {
        $statuses = $user->statuses()->paginate(10);
        return view('users.show', compact('user', 'statuses'));
    }

    public function followers(User $user)
    {
        $followers = $user->followers()->paginate(10);
        return view('followers.followers', compact('followers'));
    }

    public function followings(User $user)
    {
        $followings = $user->followings()->paginate(10);
        return view('followers.followings', compact('followings'));
    }
}
