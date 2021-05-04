<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\maincategorie;
use App\Models\subcategorie;
use DB;
class categoryController extends Controller
{
    public function addcategory(){
        $maincategory= maincategorie::all();
        return view('pages.product.addcategory',['data'=>$maincategory]);
    }

    public function addmaincategory(Request $req){
        $req->validate([
            'maincategory'=>'required |unique:maincategories,maincategoryname,'
        ]);
        $maincate=new maincategorie;
        $maincate->maincategoryname =ucfirst($req->maincategory);
        if($maincate->save()){
            return redirect('addcategory')->with('success','Maincategory Add successfully');
        }
    }

    public function addsubcategory(Request $req){
        $req->validate([
            'selectmaincategory'=>'required',
            'subcategory'=>'required |unique:subcategories,subcategoryname,'
        ]);
        $subcate= new subcategorie;
        $subcate->maincategory_id=$req->selectmaincategory;
        $subcate->subcategoryname=ucfirst($req->subcategory);
        if($subcate->save()){
           return back()->with('success','Subcategory Add successfully');  
        } 

    }

    public function maincategorylist(){
           $maincat= maincategorie::select('id','maincategoryname','created_at')->orderBy('id', 'DESC')->get();
        return view('pages.product.maincategory',['maincat'=>$maincat]);   
    }

    public function viewsubcategory($id){
        $maincat = DB::table('maincategories')->where('id',$id)->first();
        $subcat = subcategorie::where('maincategory_id',$id)->orderBy('id', 'DESC')->get();
        return view('pages.product.subcategory',['subcat'=>$subcat,'maincat'=>$maincat]);  
    }

    public function deletemaincategory($id){
         $maindata= maincategorie::where('id',$id);
         $subdata= subcategorie::where('maincategory_id',$id);
            
         if( $maindata->delete()){
            $subdata->delete();
              return back()->with('success','Maincategory has been deleted.');
        }
    }

}
