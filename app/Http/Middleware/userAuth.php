<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class userAuth
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
        // GUEST
        if($request->path()=='/' && !session()->has('user'))
        {
            return redirect('login');
        }

        if($request->path()=='logout' && !session()->has('user'))
        {
            return redirect('login');
        }

        if($request->path()=='employee' && !session()->has('user'))
        {
            return redirect('login');
        }

        if($request->path()=='attendance/morning' && !session()->has('user'))
        {
            return redirect('login');
        }

        if($request->path()=='attendance/afternoon' && !session()->has('user'))
        {
            return redirect('login');
        }

        if($request->path()=='dtr' && !session()->has('user'))
        {
            return redirect('login');
        }

        if($request->path()=='event' && !session()->has('user'))
        {
            return redirect('login');
        }

        if($request->path()=='event/eventmodify' && !session()->has('user'))
        {
            return redirect('login');
        }

        // USER
        if($request->path()=='login' && session()->has('user'))
        {
            return redirect('/');
        }

        if($request->path()=='signup' && session()->has('user'))
        {
            return redirect('/');
        }

        //

        return $next($request);
    }
}
