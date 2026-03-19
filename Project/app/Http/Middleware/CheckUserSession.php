<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserSession
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('visited')) {
            session(['visited' => true]);
            session()->flash('success', 'Welcome! Session middleware has been applied successfully.');
        }

        return $next($request);
    }
}