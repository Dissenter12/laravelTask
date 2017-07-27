<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        if ($request->user()->role != 'admin') {
            
           // $message = "your not allowed to do that";
           //  echo "<script type='text/javascript'>alert('$message');</script>";
            // return redirect('/');
            // return "sorry you are not allowed here.";
        } else {
            return redirect('/home');
        }
        // return $next($request);
    }
}
