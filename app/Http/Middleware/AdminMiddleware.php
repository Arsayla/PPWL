<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Pengunjung yang belum login diarahkan ke form login, bukan halaman error.
        if (! $request->user()) {
            return redirect()->guest(route('login'));
        }

        // Pengguna yang sudah login tetapi bukan admin mendapat HTTP 403.
        if ($request->user()->role !== 'admin') {
            abort(403, 'Halaman ini hanya dapat diakses oleh admin.');
        }

        return $next($request);
    }
}
