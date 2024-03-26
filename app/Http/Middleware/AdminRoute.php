<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\UseCases\User\ProfileUserENUM;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminRoute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            app(User::class)->where('profile', '!=', ProfileUserENUM::ADMIN)
                ->where('email', $request->email)->exists()
        ) {
            abort(403);
        }

        return $next($request);
    }
}
