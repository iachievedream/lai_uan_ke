<?php

namespace App\Http\Middleware;

use Closure;

class VerifyUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $username = $request->session()->get('username', NULL);

        if ( $username === NULL )
        {
            return redirect('/');
        }

        $request->attributes->add(['username' => $username]);
        return $next($request);
    }
}
