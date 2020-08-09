<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function destroy(User $follower)
    {
        $user = Auth::user();
        $user->unfollow($follower->id);
        session()->flash('success', "You have unfollowed {$follower->name}");
        return back();
    }

    public function store(User $follower)
    {
        $user = Auth::user();
        $user->follow($follower->id);
        session()->flash('success', "You have followed {$follower->name}");
        return back();
    }
}
