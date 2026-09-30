<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class Admin
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->get('role') !== 'admin') {
            abort(403, 'Akses ditolak. Anda bukan admin.');
        }

        return $next($request);
    }

    public function terminate($request, $response)
    {
        Log::info('Request selesai', [
            'url' => $request->fullUrl()
        ]);
    }
}