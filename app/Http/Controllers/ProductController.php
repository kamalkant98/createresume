<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\createproduct;
use App\Models\product;
use App\Models\sidefile;
use App\Models\User;
use App\Models\maincategorie;
use App\Models\subcategorie;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    
    public function productadd(){
        $maincate= maincategorie::all();
        $subcate= subcategorie::all();
        return view('pages.product.productadd',['maincate'=>$maincate,'subcate'=>$subcate]);
    }
    public function productlist(Request $request){
        $id=session('user')->id;
        $user= User::select('permissions')->where('id',$id)->first();
        $permission=explode(',',$user->permissions); 
        $products= product::where('user_id',$id)->orderBy('id', 'DESC')->paginate(10);
       
        $html='';
        foreach ($products as $product) {
            $maincate= maincategorie::select('maincategoryname')->where('id',$product->maincategory)->first();
            $subcate= subcategorie::select('subcategoryname')->where('id',$product->maincategory)->first();
                $btn='';
            if(!in_array('editproduct',$permission)){
                $btn.=' <a href="productedit/'.$product->id.'"><button type="submit" class="btn btn-theme-dark btn-sm"><i class="zwicon-marker"></i> Edit</button></a>';
            }if(!in_array('deleteproduct',$permission)){
                $btn.='<button type="submit" class="btn btn-outline-danger btn-sm deletebtn" id="'.$product->id.'" data-toggle="modal" data-target="#modal-default"><i class="zwicon-trash"></i> Delete</button></td>';
            }
            $html.=' <tr>
                                        
                        <td>'.$product->coverfile.'</td>
                        <td>'.$product->name.'</td>
                        <td>'.$maincate->maincategoryname.'</td>
                        <td>'.$subcate->subcategoryname.'</td>
                        <td>'.$product->price.'</td>
                        <td>'.$product->discount.'</td>
                        <td>'.$product->description.'</td>
                        <td> <button type="submit" class="btn btn-theme-dark btn-sm"><i class="zwicon-eye"></i> View</button>'.$btn.'
                             
                              
                              

                    </tr>';
            }
        if ($request->ajax()) {
            return $html;
        }
      return view('pages.product.productlist',['products'=>$products]);
    }
    
    public function create_product(request $request){
     
        $validator =   Validator::make($request->all(), [
            'name' => 'required',
            'MainCategory' => 'required',
            'subCategory'=>'required',
            'Price'=>'required',
            'Discount'=>'required',
            'Description'=>'required',
            'coverfiles'=>'required|image|mimes:jpeg,png,jpg',
            'imgs'=>'required'
          ]);
        if ($validator->fails()) {
            return  back()->withErrors($validator); //Sends back only room name
        } else {


        /* $request->validate([
           
        ]); */
             $user_id = session('user')->id;
            $product = new product;
            $product->user_id=$user_id;
            $product->name=$request->name;
            $product->maincategory=$request->MainCategory;
            $product->subcategory=$request->subCategory;
            $product->price=$request->Price;
            $product->discount=$request->Discount;
            $product->description=$request->Description;
            if ($request->hasFile('coverfiles')) {
                $filename= Str::random(7).time().'.'.$request->file('coverfiles')->Extension();
                $image= $request->file('coverfiles')->move('coverfiles',$filename);
               $product->coverfile=$filename ;
            } 
            if($product->save()){
               foreach($request->imgs as $sidefiles){
                   $images=new sidefile;
                   $images->productid=$product->id;
                   $images->sidefile=$sidefiles;
                   $images->save();
               }
               return back()->with('success','Product add successfully');
            }
        }
           
        
    }

    public function tmpimage(Request $request){
        $allowfiles = [];
        $filenotallowed=[];
        $notallowfileorignale=[];
        if($request->hasfile('sidefiles'))
         {  $allowed_image_extension = array("png","jpg","jpeg" );
            foreach($request->file('sidefiles') as $file)
            {   
                $ext =$file->getClientOriginalExtension();
                $orignalename=$file->getClientOriginalName();
                $name = Str::random(7).time().'.'.$file->Extension();
                if(! in_array( $ext,$allowed_image_extension) ){
                    $filenotallowed[]=$name;
                    $notallowfileorignale[]=$orignalename;
                }else{
                    $file->move(public_path('sidefiles'), $name);
                    $allowfiles[]=$name;   
                }    
                 
            }
         }
        return response()->json(['data'=>$allowfiles,'notallow'=>$filenotallowed,'orignalename'=>$notallowfileorignale,'status'=>true,'message'=>'Product List']);
    }

    public function deleteproduct($id){
        $product= product::where('id',$id)->first();
        $sidefile=sidefile::where('productid',$id)->get();
        $sidefiledelete=sidefile::where('productid',$id);
        $coverfile= 'coverfiles/'.$product->coverfile;
       
        if(!empty($product)){
            if($product->delete()){
                if(file_exists($coverfile)){
                    @unlink($coverfile);
                } 
                if($sidefiledelete->delete()){
                    foreach($sidefile as $file){
                        $sidefilepath= 'sidefiles/'.$file->sidefile;
                        if(file_exists($sidefilepath)){
                            @unlink($sidefilepath);
                        }
                    }
                }
            }
           return back()->with('success','Product Gas been deleted successfully');
        }
    }

    public function productedit($id){
        $productedit= product::where('id',$id)->first();
        $productsidefile= sidefile::where('productid',$id)->get();
        $maincate= maincategorie::all();
        $subcate= subcategorie::all();
        return view('pages.product.productedit',['productedit'=>$productedit,'productsidefile'=>$productsidefile,'maincate'=>$maincate,'subcate'=>$subcate]);

    }

    public function deletesideimage(Request $req){
        $image=$req->imgval;
    
       $sidefiles= sidefile::where('sidefile',$image)->first();
        if(!empty($image)){
            if(!empty($sidefiles)){
                if($sidefiles->delete()){
                    $file='sidefile/'.$image;
                    if(file_exists($file)){
                        @unlink($file);
                    }
                }
            }else{
                $file='sidefiles/'.$image;
                if(file_exists($file)){
                    @unlink($file);
                }
            }
            return response()->json(['status'=>true,'message'=>'remove image']);
        }
    }

    public function update_product(Request $request){
           // echo $request->oldimg ; exit();
        if(!empty($request->productid)){
            $product= product::where('id',$request->productid)->first();
            $product->name=$request->name;
            $product->maincategory=$request->MainCategory;
            $product->subcategory=$request->subCategory;
            $product->price=$request->Price;
            $product->discount=$request->Discount;
            $product->description=$request->Description;
            if ($request->hasFile('coverfiles')) {
                $filename= Str::random(7).time().'.'.$request->file('coverfiles')->Extension();
                $image= $request->file('coverfiles')->move('coverfiles',$filename);
                $product->coverfile=$filename ;
            }else{
                $product->coverfile=$request->oldimg; 
            }
            if($product->save()){
                if(!empty($request->imgs)){
                    foreach($request->imgs as $sidefiles){
                        $images=new sidefile;
                        $images->productid=$product->id;
                        $images->sidefile=$sidefiles;
                        $images->save();
                    }
                }
            }
            return back()->with('success','Product has been updatede successfully');
        }

    }
}
