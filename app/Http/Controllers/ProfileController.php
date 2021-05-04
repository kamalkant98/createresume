<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\usersociallink;
use App\Models\User;
use App\Models\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function setting(){
        $userid= session('user')->id;
        $setting = setting::where('user_id',$userid)->first();
        return view('profile.setting',['setting'=>$setting]);
    }
    public function edit()
    {     
            $userid=session('user')->id;
            $user= User::where('id',$userid)->first();
            $sociallink= usersociallink::where('user_id',$userid)->first();
            return view('profile.edit',['user'=>$user,'social'=>$sociallink]);
    }

    public function updatesetting(Request $request){
        if($request->userid == null){
            
            $setting= new setting;
            $setting->user_id=session('user')->id;
            
        }else{
            echo $request->userid;
            $setting=setting::where('user_id',$request->userid)->first();
        }
         $setting->body_bg_color=$request->body_bg_color;
        $setting->body_font_color=$request->body_font_color;
        $setting->section_bg=$request->section_bg;
        $setting->section_title_color=$request->section_title_color;
        $setting->form_bg_color	=$request->form_bg_color;
        $setting->info_bg_color=$request->info_bg_color;
        $setting->banner_title_color=$request->banner_title_color;
        $setting->Services_icon_color=$request->Services_icon_color;
        $setting->Services_icon_hover=$request->Services_icon_hover;
        $setting->Services_title_color=$request->Services_title_color;
        $setting->Services_title_hover=$request->Services_title_hover;
        $setting->social_bg=$request->social_bg;
        $setting->social_color=$request->social_color;
        $setting->social_bg_hover=$request->social_bg_hover;
        $setting->social_color_hover=$request->social_color_hover;
        $setting->nav_icon_color=$request->nav_icon_color;
        $setting->nav_icon_hover=$request->nav_icon_hover;
        $setting->nav_a_color=$request->nav_a_color;
        $setting->nav_a_hover=$request->nav_a_hover;
        $setting->nav_bg=$request->nav_bg;
        $setting->footer_bg=$request->footer_bg;

        if($setting->save()){
            return back()->with('success','Setting has been updated.');
        }

        
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {   
    
        $userid= session('user')->id;
        $request->validate([
            'username'=>'required|string|max:255|unique:users,username,'.$userid,
            'name'=>'required',
            'email'=>'required|email|max:255|unique:users,email,'.$userid,
            'address'=>'required',
            'telephone'=>'required',
            'telephone2'=>'required',
            'addresslink'=>'nullable|url',
            'profile'=>'nullable|image|mimes:jpeg,png,jpg',
            'coverfile'=>'nullable|image|mimes:jpeg,png,jpg'
        ]);

        $updateuser= User::where('id',$userid)->first();

        $updateuser->name=$request->name;
        $updateuser->username= $request->username;
        $updateuser->email=$request->email;
        $updateuser->address=$request->address;
        $updateuser->maplocation=$request->addresslink;
        $updateuser->telephone2=$request->telephone2;
        $updateuser->telephone=$request->telephone;
        if ($request->hasFile('coverfile')) {
            $coverfilename= Str::random(7).time().'.'.$request->file('coverfile')->Extension();
            $image= $request->file('coverfile')->move('usercoverfile',$coverfilename);
           $updateuser->background=$coverfilename ;
        }
        if ($request->hasFile('profile')) {
            $profilefilename= Str::random(7).time().'.'.$request->file('profile')->Extension();
            $image= $request->file('profile')->move('userprofile',$profilefilename);
           $updateuser->profile=$profilefilename ;
        }  
        if($updateuser->save()){
            return back()->with('success','Profile successfully updated.');

        }
        //auth()->user()->update($request->all());

    }

    public function socialupdate(Request $request){
       // echo $request->instagram;  exit();
        
        if(empty($request->socialid)){
            $request->validate([
                'facebook'=>'nullable|url',
                'instagram'=>'nullable|url',
                'twitter'=>'nullable|url',
                'linkdin'=>'nullable|url',
                'skype'=>'nullable|url'
                
            ]);
            $social=new usersociallink;
            $social->user_id=session('user')->id; 
        }else if(!empty($request->socialid)){
            $request->validate([
                'facebook'=>'nullable|url',
                'instagram'=>'nullable|url',
                'twitter'=>'nullable|url',
                'linkdin'=>'nullable|url',
                'skype'=>'nullable|url'
                
            ]);
            $social = usersociallink::where('id',$request->socialid)->first();
        }
            $social->facebook=$request->facebook;
            $social->instagram=$request->instagram;
            $social->twitter=$request->twitter;
            $social->linkdin=$request->linkdin;
            $social->skype=$request->skype;
            if(isset($request->socialper) && !empty($request->socialper)){
               $permissionarr='';
                $permissionarr.=implode(',',$request->socialper);
                $social->permissions=$permissionarr; 
          
            }else{
                $social->permissions='';
            }
            if($social->save()){
                return  back()->with('success','your social link has been updated successfully.');
            }
            

    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withStatusPassword(__('Password successfully updated.'));
    }
}
