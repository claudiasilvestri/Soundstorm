<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index','show']),
        ];
    }

    public function index()
    {
        $tracks = Track::all();
        return view('tracks.index', compact('tracks'));
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

        return redirect(route('homepage'))->with('success', 'Hai aggiunto correttamente il tuo brano');
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
            $track->cover = $request->file('cover')->store('covers', 'public');
        }

        if ($request->hasFile('path')) {
            $track->path = $request->file('path')->store('tracks', 'public');
        }

        $track->update($request->only('title', 'description'));

        return redirect()->route('tracks.show', $track)->with('success', 'Brano aggiornato con successo!');
    }

    public function destroy(Track $track)
    {
        $track->delete();

        return redirect(route('tracks.index'))->with('success', 'Brano eliminato con successo');
    }
}
