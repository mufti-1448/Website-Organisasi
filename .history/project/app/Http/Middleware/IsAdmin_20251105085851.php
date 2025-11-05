<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jika user tidak admin, kembalikan ke halaman login dengan pesan error
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request);
        }

        return redirect()->route('login')->with('error', 'Hanya admin yang dapat mengakses halaman ini.');
    }
}
