<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\userskill;
use App\Models\testimonial;
use App\Models\usersociallink;
use App\Models\setting;
class cardcontroller extends Controller
{
    public function usercard($username){
       $user = User::where('username',$username)->first();
            if($user){
                $testimonial= testimonial::where('user_id',$user->id)->get();
                $skills= userskill::where('user_id',$user->id)->get();
                $sociallink= usersociallink ::where('user_id',$user->id)->first();
                $setting=setting::where('user_id',$user->id)->first();
            return view('card',['user'=>$user,'testimonials'=>$testimonial,'skills'=>$skills,'links'=>$sociallink,'setting'=>$setting]);
        }else{
            return redirect('login');
        }
    }
}
