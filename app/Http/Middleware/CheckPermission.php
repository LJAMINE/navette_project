<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\URL;


class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!Auth::check()) {
            return redirect('/login')->with('error', 'You must be logged in.');
        }

        $user=Auth::user();
        
        $currentRoute=Route::currentRouteName();

        $hasPermission=$user->role->permissions->contains('name',$currentRoute);

        if (!$hasPermission) {
            // abort(403);
            abort(403, 'Access denied: You do not have the permission.');
        }


     
        return $next($request);
    }
}
