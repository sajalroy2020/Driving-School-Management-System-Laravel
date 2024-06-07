<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (Auth::user()->role == USER_ROLE_ADMIN || Auth::user()->role == USER_ROLE_STAFF) {
                    return redirect(route('admin.dashboard'))->with('success', __('Welcome to your dashboard'));
                }if (Auth::user()->role == USER_ROLE_INSTRUCTOR) {
                    return redirect(route('instructor.dashboard'))->with('success', __('Welcome to your dashboard'));
                }if (Auth::user()->role == USER_ROLE_STUDENT) {
                    return redirect(route('student.dashboard'))->with('success', __('Welcome to your dashboard'));
                }else {
                    Auth::logout();
                    return redirect("login")->with('error', __('Invalid user'));
                }
            }
        }
        return $next($request);
    }
}
