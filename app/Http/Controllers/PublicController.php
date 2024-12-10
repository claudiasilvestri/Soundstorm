<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller 
{
    public function homepage()
    {
        $track = Track::orderBy('created_at', 'DESC')
            ->take(4)
            ->get();

        return view('welcome', compact('track'));
    }

    public function index()
{
    if (Auth::user()->role === 'admin' || Auth::user()->role === 'user') {
        return view('dashboard');
    }
    abort(403, 'Accesso negato');
}

}
