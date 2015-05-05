<?php namespace App\Http\Middleware;

use Closure;

class MarkOnline {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /**
         * Marking the user Online
         */
        if ( \Auth::check() && ( ! \Auth::user()->isOnline() ) ) {
            \Auth::user()->makeOnline();
        }

        return $next($request);
    }

}
