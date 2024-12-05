<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Genre;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\DownloadNotificationMail;
use App\Services\EmailService;

class TrackController extends Controller
{
    public static function middleware()
    {
        return [
            'auth',
            'track.owner' => ['only' => ['edit', 'update', 'destroy']],
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

        $coverPath = $request->file('cover')->store('covers', 'public');
        $trackPath = $request->file('path')->store('tracks', 'public');

        $track = Track::create([
            'title' => $request->input('title'),
            'cover' => $coverPath,
            'description' => $request->input('description'),
            'path' => $trackPath,
            'user_id' => Auth::id(),
        ]);

        $track->genres()->attach($request->input('genres'));

        return redirect()->route('welcome')->with('success', 'Hai aggiunto correttamente il tuo brano.');
    }

    public function show(Track $track)
    {
        return view('track.show', compact('track'));
    }

    public function edit(Track $track)
    {
        $genres = Genre::all();
        return view('track.edit', compact('track', 'genres'));
    }

    public function update(Request $request, Track $track)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'path' => 'nullable|file|mimes:mp3,wav,aac|max:10240',
        ]);

        $track->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if ($request->hasFile('cover')) {
            if ($track->cover) {
                Storage::disk('public')->delete($track->cover);
            }
            $track->update(['cover' => $request->file('cover')->store('covers', 'public')]);
        }

        if ($request->hasFile('path')) {
            if ($track->path) {
                Storage::disk('public')->delete($track->path);
            }
            $track->update(['path' => $request->file('path')->store('tracks', 'public')]);
        }

        $track->genres()->sync($request->genres);

        return redirect(route('profile.page'))->with('success', 'Hai modificato correttamente il tuo brano.');
    }

    public function destroy(Track $track)
    {
        if ($track->cover) {
            Storage::disk('public')->delete($track->cover);
        }
        if ($track->path) {
            Storage::disk('public')->delete($track->path);
        }

        $track->genres()->detach();
        $track->delete();

        return redirect()->route('track.index')->with('success', 'Brano eliminato con successo.');
    }

    public function searchByUser($userId)
    {
        $tracks = Track::where('user_id', $userId)->orderBy('created_at', 'DESC')->get();
        return view('track.user', compact('tracks'));
    }

    public function filterByUser(User $user)
    {
        $tracks = Track::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();
        return view('track.searchByUser', compact('tracks', 'user'));
    }

    public function filterByGenre(Genre $genre)
    {
        $tracks = $genre->tracks->sortByDesc('created_at');
        return view('track.filterByGenre', compact('tracks', 'genre'));
    }

    public function download(Track $track)
    {
        $email = $track->user->email;
        $username = $track->user->name;
        $trackTitle = $track->title;

        Mail::to($email)
            ->send(new DownloadNotificationMail(
                $username, $trackTitle
            ));

        $path = storage_path('app/public/' . $track->path);
        return response()->download($path);
            
    }
}
