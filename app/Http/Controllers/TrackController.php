<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Track;
use Illuminate\Http\Request;
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


    // public function __construct()
    // {
    //     $this->middleware('auth')->except(['index', 'show', 'searchByUser']);
    // }

    public function index()
    {
        $tracks = Track::orderBy('created_at', 'DESC')->get();
        return view('track.index', compact('tracks'));
    }

    public function create()
    {
        return view('tracks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'path' => 'required|file|mimes:mp3,wav,aac|max:10240',
        ]);

        $coverPath = $request->file('cover')->store('covers', 'public');
        $trackPath = $request->file('path')->store('tracks', 'public');

        Track::create([
            'title' => $request->title,
            'cover' => $coverPath,
            'description' => $request->description,
            'path' => $trackPath,
            'user_id' => auth()->id(),
        ]);

        return redirect(route('welcome'))->with('success', 'Hai aggiunto correttamente il tuo brano');
    }

    public function show(Track $track)
    {
        return view('tracks.show', compact('track'));
    }

    public function edit(Track $track)
    {
        return view('tracks.edit', compact('track'));
    }

    public function update(Request $request, Track $track)
    {
        $request->validate([
            'title' => 'sometimes|string|max:255',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'sometimes|string',
            'path' => 'nullable|file|mimes:mp3,wav,aac|max:10240',
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

        return redirect(route('tracks.index'))->with('success', 'Brano eliminato con successo');
    }

    public function searchByUser($user)
    {
        $tracks = Track::where('user_id', $user)->get();
        return view('tracks.user', compact('tracks'));
    }

    public function filterByUser(User $user)
    {
        $tracks = Track::where('user_id', $user->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('tracks.searchByUser', compact('tracks', 'user'));
    }
}
