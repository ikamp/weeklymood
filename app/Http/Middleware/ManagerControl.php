<?php
namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class ManagerControl
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
        if (Auth::user()->is_manager != 'TRUE') {
            return abort(403, "Sorry, you don't show this page.");
        }
        return $next($request);
    }
}