<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'You must be logged in to access this page.');
        }

        // Check if user is regular user (not admin or librarian)
        if (auth()->user()->role !== 'user') {
            return redirect('/admin/dashboard')->with('info', 'Admin and librarian cannot borrow books. This feature is only available for regular users.');
        }

        return $next($request);
    }
}
