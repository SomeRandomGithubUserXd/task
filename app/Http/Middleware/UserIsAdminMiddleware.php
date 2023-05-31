<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class UserIsAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        abort_if(!$request->user()->tokenCan(User::$adminAbility), 401);
        return $next($request);
    }
}
