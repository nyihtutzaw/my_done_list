<?php

namespace App\Http\Middleware;

use Closure;

class UserAuth
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    private $redirectUrl = '/';
    
    public function handle($request, Closure $next)
    {
        $user_repo=new \App\Repo\User;
        if ($user_repo->getAuthUser()== null) {
            return redirect($this->redirectUrl);
        }
      
        
          return $next($request);
    }
}
