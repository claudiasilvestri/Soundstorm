<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Genre;
use App\Models\Track;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public static function middleware(): array
    {
        return [
            'auth',
        ];
    }

    public function dashboard()
    {
        $currentUser = auth()->user();

        if (!$currentUser || !$currentUser->profile->is_admin) {
            abort(403, 'Non autorizzato');
        }

        $usersCount = User::count();

        return view('admin.dashboard', compact('usersCount'));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function track()
    {
        $track = Track::all();
        return view('admin.track', compact('track'));
    }

    public function genres()
    {
        $genres = Genre::all();
        return view('admin.genres', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:genres,name',
        ]);

        Genre::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Hai creato un nuovo genere');
    }

    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'name' => 'required|unique:genres,name,' . $genre->id,
        ]);

        $genre->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.genres')->with('success', 'Hai aggiornato un genere');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->back()->with('success', 'Hai cancellato un genere');
    }
}
