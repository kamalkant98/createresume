<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\usersociallink;

class socialcontroller extends Controller
{
    public function addsocial(Request $req){
        $req->validate([
            'socialname'=>'required |unique:usersociallinks,social_name,',
            'link'=>'required |url '
        ]);
        $userid=session('user')->id;
        $addsocial=new usersociallink;
        $addsocial->user_id=$userid;
        $addsocial->social_name =strtoupper($req->socialname);
        $addsocial->social_link =$req->link;
        if($addsocial->save()){
            return back()->with('success','Maincategory Add successfully');
        }
    }

    public function sociallinklist(){
        $userid= session('user')->id;
        $sociallinklist = usersociallink :: where('user_id',$userid)->get();
        return view('pages.sociallinks.sociallinklist',['data'=>$sociallinklist]);
     }
}


