<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function home()
    {
        $statuses = Status::with('user')->orderBy('created_at', 'desc')->limit(500)->paginate(10);
        return view('static_pages.home', compact('statuses'));
    }

    public function help()
    {
        return view('static_pages.help');
    }

    public function about()
    {
        return view('static_pages.about');
    }
}
