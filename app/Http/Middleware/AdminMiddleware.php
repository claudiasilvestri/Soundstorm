<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        Log::info('Verifica permessi utente', [
            'user_id' => $user?->id,
            'is_admin' => $user?->isAdmin() ?? false,
        ]);

        if (!$user || !$user->pro->isAdmin()) {
            Log::warning('Accesso negato per utente', [
                'user_id' => $user?->id,
                'email' => $user?->email,
            ]);

            return redirect()->route('home')->with([
                'status' => 'error',
                'message' => 'Non hai i permessi per accedere a questa sezione.',
            ]);
        }

        return $next($request);
    }
}







