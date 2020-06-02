<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class TwoStepAuthPass
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);

        // Check if a two factory authentication is verified once & exceeded expiry time
        // if so, then unset session and logout to redirect /login.
        if (time() < $request->user()->twofactory_expiry) {
            return $next($request);
        }
        else {

            $request->user()->twofactory_expiry = null;

            Auth::guard()->logout();

            $request->session()->invalidate();

            return redirect('/login');
        }

        // return response([
        //     'error' => [
        //         'code' => 'INSUFFICIENT_ROLE',
        //         'description' => 'You are not authorized to access this resource.',
        //     ],
        // ], 401);
    }

}
