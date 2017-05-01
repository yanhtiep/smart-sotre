<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
    // return Auth::onceBasic() ?: $next($request);
    //dd(Auth::check());
    // // if ( Auth::check() && Auth::user()->isAdmin() )
    if (Auth::check())
    {
      return $next($request);
    }

    return redirect()->route('admin.login');
  }
}
