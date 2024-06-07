<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RolePermissionStatusChecking
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->role == USER_ROLE_STAFF){
            $roleData = auth()->user()->roles()->first();
            if ($roleData->status != STATUS_ACTIVE){
                Auth::logout();
                return redirect("login")->withInput()->with('error',  __('Contact with admin, your have not any permission'));
            }
        }
        return $next($request);
    }
}
