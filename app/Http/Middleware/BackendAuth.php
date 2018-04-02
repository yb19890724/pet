<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class BackendAuth
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
        $request->merge($this->getAdmin());
        return $next($request);
    }

    private function getAdmin()
    {
        $auth=Auth::user();
        return !empty($auth)?[
            'admin_id'=>$auth->id,
            'name'=>$auth->name
        ]:[];
    }
}
