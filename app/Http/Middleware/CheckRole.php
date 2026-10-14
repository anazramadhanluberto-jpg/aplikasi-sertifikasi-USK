<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // Cek apakah role user ada di dalam parameter middleware
        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        // Jika bukan hak aksesnya, lempar ke dashboard masing-masing atau abort
        if ($user->role == 'admin') {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }
}
