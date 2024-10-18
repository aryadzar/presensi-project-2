<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
        /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        // Periksa apakah user memiliki role yang diberikan
        if ($user && $user->setRoles()->whereHas('role', function($query) use ($role) {
            $query->where('nama_role', $role);
        })->exists()) {
            return $next($request);
        }

        return redirect()->route('role')->withErrors('Anda tidak memiliki akses untuk fitur ini.');
    }
}
