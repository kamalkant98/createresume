<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
        if(!empty(session('user'))){
            if(session('user')->id != '' && session('user')->usertype =="2"){
              
            }
            else{
                return back()->with('error','not allowed this page .');
            } 
         }else{
            return route('login');
         }
        return $next($request);
    }
}
