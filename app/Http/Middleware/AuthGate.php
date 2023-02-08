<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthGate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if( !app()->runningInConsole() && $user ) {
            $roles = Role::with('permissions')->get();
            $permissions = [];

            foreach($roles as $role) {
                foreach($role->permissions as $permission) {
                    $permissions[$permission->name][] = $role->id;
                }
            }

            foreach($permissions as $name => $role) {
                Gate::define($name, function(User $user) use($role) {
                    return count(array_intersect($user->roles()->pluck('id')->toArray(), $role)) > 0;
                });
            }
        }

        return $next($request);
    }
}
