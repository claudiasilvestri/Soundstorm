<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Track;
use Symfony\Component\HttpFoundation\Response;

class CheckTrackOwner
{
    public function handle(Request $request, Closure $next): Response
    {
        $track = $request->route('track');

        if (!$track || $track->user_id !== Auth::id()) {
            abort(403, 'Non autorizzato');
        }

        return $next($request);
    }
}

