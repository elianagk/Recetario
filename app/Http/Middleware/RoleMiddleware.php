<?php

namespace App\Http\Middleware;

use App\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;
use App\Models\Role;
use Illuminate\Support\Facades\DB;


class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }

        $roles = is_array($role)
            ? $role
            : explode('|', $role);

        if (! Auth::guard($guard)->user()->hasAnyRole($roles)) {
            return redirect()->route('receta.index')->with('error', 'Permiso denegado');
        }
        //---------------------------------------------------------------------------
        


         return $next($request);
    }
}