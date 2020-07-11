<?php

namespace App\Http\Middleware;

use Closure;

class UserTypeMiddleware
{

    public static $allowedUserTypes = ['super_admin', 'admin', 'vendor'];

    public function handle($request, Closure $next)
    {
        if (auth()->guard('admins')->check()) {

            $user = auth()->guard('admins')->user();

            if (in_array($user->user_type, self::$allowedUserTypes)) {
                return $next($request);
            }
        }

        return redirect(route('home'));

    }
}
