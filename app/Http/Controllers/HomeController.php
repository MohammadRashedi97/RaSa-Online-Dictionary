<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Word;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Auth middleware
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard based on role.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if($user->hasRole(['admin', 'editor']))
        {
            $words = Word::orderBy('word')->paginate(20);
            return view('backend.dashboard', compact('words'));
        }
        else
            return view('frontend.dashboard');
    }

    // return contact view
    public function contactUs()
    {
        return view('frontend.contact');
    }

    // return about view
    public function about()
    {
        return view('frontend.about');
    }
}
