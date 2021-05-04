<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\allskill;
use App\Models\userskill;
class skillcontroller extends Controller
{
    
    public function addskill(){
        $allskills= allskill::all();
        return view('pages.skills.addskills',['data'=>$allskills]);
    }
    
   public function addnewskill(Request $req){
        $req->validate([
            'skillname'=>'required |unique:allskills,skillname,'
        ]);
        $allskill=new allskill;
        $allskill->skillname =strtoupper($req->skillname);
        if($allskill->save()){
            return redirect('addskill')->with('success','Maincategory Add successfully');
        }
    }

    
    public function userskill(Request $req){
        $req->validate([
            'userskillname'=>'required |unique:userskills,skillname,',
            'percentage'=>'required'
        ]);
        $userid = session('user')->id;
     
        $userskill= new userskill;
        $userskill->user_id=$userid;
        $userskill->skillname=$req->userskillname;
        $userskill->percentage=$req->percentage;
        if($userskill->save()){
           return back()->with('success','user skills Add successfully');  
        } 
    }
    
    public function skill_list(){
        $skills= userskill::select('id','skillname','percentage','created_at')->orderBy('id', 'DESC')->get();
     return view('pages.skills.skill_list',['skiills'=>$skills]);   
    }

    public function editskill($id){
        $allskills= allskill::all();
        $skills= userskill::where('id',$id)->first();
        return view('pages.skills.editskills',['data'=>$skills,'allskills'=>$allskills]);

    }
    public function updateskill(Request $req,$id){
        $req->validate([
            'userskillname'=>'required |unique:userskills,skillname,'.$id,
            'percentage'=>'required'
        ]);
        $userskill= userskill::where('id',$id)->first();
       // $userskill= new userskill;
      //  $userskill->user_id=$userid;
        $userskill->skillname=$req->userskillname;
        $userskill->percentage=$req->percentage;
        if($userskill->save()){
           return back()->with('success','user skills update successfully');  
        } 
    }

}
