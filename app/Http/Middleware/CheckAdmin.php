<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class CheckAdmin
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
       $doctor_id =Session::get('doctor_id');
       $roll_id =Session::get('roll_id');
       if ($roll_id ==1) {
           return $next($request);
        }

        else
        {
            return redirect('/admin');
        }
    }
}
