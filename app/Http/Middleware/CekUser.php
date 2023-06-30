<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $rule)
    {

        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();
        if ($user->level == 1) {
            return $next($request);
        } else {
            return redirect('error-akses');
        }

        // $user = Auth::user();
        // if ($user->level == $rule) {
        //     return $next($request);
        // }

        // return redirect('/')->with('error', 'Tidak memiliki akses');
    }
}
