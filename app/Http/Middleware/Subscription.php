<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Subscription
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
            
            if(auth()->user()->payment_done =true){
                
            }
            else{
                return back()->with('error','not allowed this page ');
            } 
         }else{
            return route('login');
         }
        
        return $next($request);
    }
}
