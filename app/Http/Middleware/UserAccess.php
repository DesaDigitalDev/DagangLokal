<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $userType): Response
    {
        $user = "";

        if(auth()->user()->role_id == 1){
            $user = "admin";
        }
        if(auth()->user()->role_id == 2){
            $user = "seller";
        }
        if(auth()->user()->role_id == 3){
            $user = "producer";
        }
        if($user == $userType){
            return $next($request);
        }
        return response()->json(['You do not have permission to access for this page.']);
        /* return response()->view('errors.check-permission'); */
    }
}
