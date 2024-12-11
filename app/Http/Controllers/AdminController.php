<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Genre;
use App\Models\Track;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        if (!Auth::user()->profile->is_admin) {
            abort(403, 'Non autorizzato');
        }

        $tracks = Track::all();
        $usersCount = User::count();

        $tracksCount = $tracks->count();

        $tracksSize = 0;
        foreach ($tracks as $track) {
            $path = storage_path('app/public/' . $track->path);
            $tracksSize += filesize($path);
        }
        $tracksSize = number_format($tracksSize / 1000000, 2, ',', '');

        $now = CarbonImmutable::now();
        $previousWeek = $now->subWeek();
        $firstWeekDay = $previousWeek->startOfWeek();
        $lastWeekDay = $previousWeek->endOfWeek();

        $lastWeekUsers = User::whereBetween('created_at', [$firstWeekDay, $lastWeekDay])->count();
        $lastWeekTracks = $tracks->whereBetween('created_at', [$firstWeekDay, $lastWeekDay])->count();

        return view('admin.dashboard', compact('usersCount', 'tracksCount', 'tracksSize', 'lastWeekUsers', 'lastWeekTracks'));
    }

    public function users()
    {
        $users = User::all();
        $usersCount = User::count();
        return view('admin.users', compact('users', 'usersCount'));
    }

    public function track()
    {
        $tracks = Track::all();
        $usersCount = User::count();
        return view('admin.track', compact('tracks', 'usersCount'));
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
