<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'create']);
    }

    public function store(Request $request)
    {
        $request->validate(['contente' => 'required' | 'max:255']);
        $user = Auth::user();
        Status::create(['user_id' => $user->id, 'content' => $request->content]);
        session()->flash('success', 'You have posted a new blog!');
        return redirect()->back();
    }

    public function destroy(Status $status)
    {
        $this->authorize('destroy', $status);
        $status->delete();
        session()->flash('success', 'You have successfully deleted a post!');
        return back();
    }
}
