<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class permission
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
            $id=session('user')->id; 
            $data= User::select('permissions')->where('id',$id)->first();
         
            $permission=explode(',',$data->permissions);   
           
            if ($request->route()->named('addproduct') && in_array('addproduct',$permission)) {
                return back();
            }else if($request->route()->named('editproduct') && in_array('editproduct',$permission)){
                return back();
            }else if($request->route()->named('deleteproduct') && in_array('deleteproduct',$permission)){
                return back();
            }else if($request->route()->named('addservices') && in_array('addservices',$permission)){
                return back();
            }else if($request->route()->named('editservices') && in_array('editservices',$permission)){
                return back();
            }else if($request->route()->named('deleteservices') && in_array('deleteservices',$permission)){
                return back();
            }else if($request->route()->named('addabout') && in_array('addabout',$permission)){
                return back();
            }else if($request->route()->named('editabout') && in_array('editabout',$permission)){
                return back();
            }else if($request->route()->named('deleteabout') && in_array('deleteabout',$permission)){
                return back();
            }else if($request->route()->named('addtestimonials') && in_array('addtestimonials',$permission)){
                return back();
            }else if($request->route()->named('edittestimonials') && in_array('edittestimonials',$permission)){
                return back();
            }else if($request->route()->named('deletetestimonials') && in_array('deletetestimonials',$permission)){
                return back();
            }else{

            }
            
        
        }else{
                return redirect()->intended('login');
            }
        return $next($request);
            
           
         
    }
}
