<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Genre;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controllers\HasMiddleware;

class TrackController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'auth',
        ];
    }

    public function index()
    {
        $tracks = Track::orderBy('created_at', 'DESC')->get();
        return view('track.index', compact('tracks'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('track.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'path' => 'required|file|mimes:mp3,wav,aac|max:10240',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',
        ]);

        $track = Track::create([
            'title' => $request->input('title'),
            'cover' => $request->file('cover')->store('covers', 'public'),
            'description' => $request->input('description'),
            'path' => $request->file('path')->store('tracks', 'public'),
            'user_id' => Auth::id(),
        ]);

        $track->genres()->attach($request->input('genres'));

        return redirect()->route('homepage')->with('success', 'Hai aggiunto correttamente il tuo brano.');
    }

    public function show(Track $track)
    {
        return view('tracks.show', compact('track'));
    }

    public function edit(Track $track)
    {
        $genres = Genre::all();
        return view('tracks.edit', compact('track', 'genres'));
    }

    public function update(Request $request, Track $track)
    {
        $request->validate([
            'title' => 'sometimes|string|max:255',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'sometimes|string',
            'path' => 'nullable|file|mimes:mp3,wav,aac|max:10240',
            'genres' => 'nullable|array',
            'genres.*' => 'exists:genres,id',
        ]);

        if ($request->hasFile('cover')) {
            if ($track->cover) {
                Storage::disk('public')->delete($track->cover);
            }
            $track->cover = $request->file('cover')->store('covers', 'public');
        }

        if ($request->hasFile('path')) {
            if ($track->path) {
                Storage::disk('public')->delete($track->path);
            }
            $track->path = $request->file('path')->store('tracks', 'public');
        }

        $track->update($request->only('title', 'description'));

        if ($request->has('genres')) {
            $track->genres()->sync($request->input('genres'));
        }

        return redirect()->route('tracks.show', $track)->with('success', 'Brano aggiornato con successo!');
    }

    public function destroy(Track $track)
    {
        if ($track->cover) {
            Storage::disk('public')->delete($track->cover);
        }

        if ($track->path) {
            Storage::disk('public')->delete($track->path);
        }

        $track->delete();

        return redirect()->route('tracks.index')->with('success', 'Brano eliminato con successo');
    }

    public function searchByUser($userId)
    {
        $tracks = Track::where('user_id', $userId)->orderBy('created_at', 'DESC')->get();
        return view('tracks.user', compact('tracks'));
    }

    public function filterByUser(User $user)
    {
        $tracks = Track::where('user_id', $user->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('track.searchByUser', compact('tracks', 'user'));
    }
    
    public function filterByGenre(Genre $genre)
{
    $tracks = $genre->tracks->sortByDesc('created_at');

    return view('track.filterByGenre', compact('tracks', 'genre'));
}
}
