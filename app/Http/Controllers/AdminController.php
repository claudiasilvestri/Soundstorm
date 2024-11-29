<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Track;
use App\Models\Genre;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth'),
        ];
    }

    public function dashboard()
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Non autorizzato');
        }

        return view('admin.dashboard');
    }

    public function users()
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Non autorizzato');
        }

        $users = User::all();

        return view('admin.users', compact('users'));
    }

    public function tracks()
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Non autorizzato');
        }

        $tracks = Track::all();

        return view('admin.tracks', compact('tracks'));
    }

    public function genres()
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Non autorizzato');
        }

        $genres = Genre::all();

        return view('admin.genres', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Genre::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Hai creato un nuovo genere');
    }

    public function update(Request $request, Genre $genre)
{
    $request->validate([
        'name' => 'required',
    ]);

    $genre->update([
        'name' => $request->name,
    ]);

    return redirect()->route('profile.page',compact('genre'))->with('success', 'Hai aggiornato un genere');
}

public function destroy(Genre $genre)
{
    $genre->delete();

    return redirect()->back()->with('success', 'Hai cancellato un genere');
}


}
