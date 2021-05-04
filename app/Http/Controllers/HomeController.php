<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\createproduct;
use Illuminate\Support\Str;
use App\Models\testimonial;
use App\Models\service;
use App\Models\about;
use App\Models\User;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
   public function sendmail(){
       echo "aDASDAS"; exit();
 /*    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    Mail::to('kamalkant14march@gmail.com')->send(new \App\Mail\MyTestMail($details));
   
    dd("Email is Sent.");  */
   }
    public function index()
    {   
        if(Auth::user()){
            $id= Auth()->user()->id;
            $user= User::where('id',$id)->first();
            return view('index',['user'=>$user]);
        }
        
    }

    public function create_testimonials(Request $request){
        $request->validate([
            'title' => 'required',
            'image' => 'required |image|mimes:jpeg,png,jpg',
            'Description'=>'required',
        ]);
        $testimonial= new testimonial;
        $testimonial->title=$request->title;
        $testimonial->description=$request->Description;
        if($request->hasfile('image')){
            $filename= Str::random(7).time().'.'.$request->file('image')->Extension();
            $image= $request->file('image')->move('files',$filename);
            $testimonial->image=$filename ;
        }
        if($testimonial->save()){
            return back()->with('success','Testimonials Created successfully');
        }

    }
    

    public function update_testimonials(Request $request){
     
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg',
            'Description'=>'required',
        ]);
        if(!empty($request->testimonialid)){
            $testimonial= testimonial::where('id',$request->testimonialid)->first();
            $testimonial->title=$request->title;
            $testimonial->description=$request->Description;
         
            if($request->hasfile('image')){
                $oldimg=public_path('files/'.$request->oldimg);
                if(file_exists($oldimg)){
                    @unlink($oldimg);
                }
                $filename= Str::random(7).time().'.'.$request->file('image')->Extension();
                $image= $request->file('image')->move('files',$filename);
                 $testimonial->image=$filename ;
            }
            if($testimonial->save()){
                return back()->with('success','Testimonials has beed updated successfully.');
            }
        }
    }

    public function testimonialslist(Request $request){
        $testimonialslist= testimonial::orderBy('id', 'DESC')->paginate(10);
        $html='';
        foreach ($testimonialslist as $data) {
            $html.=' <tr>
                        <td>'.$data->title.'</td>
                        <td>'.$data->image.'</td>
                        <td>'.e($data->description).'</td>
                        <td> <button type="submit" class="btn btn-theme-dark btn-sm"><i class="zwicon-eye"></i> View</button>
                              <a href="testimonialedit/'.$data->id.'"><button type="submit" class="btn btn-theme-dark btn-sm"><i class="zwicon-marker"></i> Edit</button></a>
                              <button type="submit" class="btn btn-outline-danger btn-sm deletebtn" id="'.$data->id.'" data-toggle="modal" data-target="#modal-default"><i class="zwicon-trash"></i> Delete</button></td>

                    </tr>';
            }
        if ($request->ajax()) {
            return $html;
        }
      return view('pages.Testimonials.testimonialslist',['data'=>$testimonialslist]);
    }

    public function testimonialedit($id){
        $testimonial= testimonial::where('id',$id)->first();
        return view('pages.Testimonials.addtestimonials',['testimonial'=>$testimonial]);
    }

    public function deletetestimonials($id){
        $delete = testimonial::where('id',$id)->first();
        if($delete->delete()){
            $image=public_path('files/'.$delete->image);
            if(file_exists($image)){
                @unlink($image);
            }
            return back()->with('success','Testimonials Has Been deleted successfully');
        }
        
    }
    //services

    public function create_services(Request $request){
        $request->validate([
            'title' => 'required',
            'image' => 'required |image|mimes:jpeg,png,jpg',
            'Description'=>'required',
        ]);
        $service= new service;
        $service->title=$request->title;
        $service->description=$request->Description;
        if($request->hasfile('image')){
            $filename= Str::random(7).time().'.'.$request->file('image')->Extension();
            $image= $request->file('image')->move('files',$filename);
            $service->image=$filename ;
        }
        if($service->save()){
            return back()->with('success','service Created successfully');
        }

    }
    

    public function update_services(Request $request){
        
       $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg',
            'Description'=>'required',
        ]);
        if(!empty($request->serviceid)){
           
            $service= service::where('id',$request->serviceid)->first();
            $service->title=$request->title;
            $service->description=$request->Description;
            if($request->hasfile('image')){
                $oldimg=public_path('files/'.$request->oldimg);
                if(file_exists($oldimg)){
                    @unlink($oldimg);
                }
                $filename= Str::random(7).time().'.'.$request->file('image')->Extension();
                $image= $request->file('image')->move('files',$filename);
                $service->image=$filename ;
            }
            if($service->save()){
                return back()->with('success','service has beed updated successfully.');
            }
        }
    }

    public function serviceslist(Request $request){
        $serviceslist= service::orderBy('id', 'DESC')->paginate(10);
        $html='';
        foreach ($serviceslist as $data) {
            $html.=' <tr>
                        <td>'.$data->title.'</td>
                        <td>'.$data->image.'</td>
                        <td>'.e($data->description).'</td>
                        <td> <button type="submit" class="btn btn-theme-dark btn-sm"><i class="zwicon-eye"></i> View</button>
                              <a href="servicesedit/'.$data->id.'"><button type="submit" class="btn btn-theme-dark btn-sm"><i class="zwicon-marker"></i> Edit</button></a>
                              <button type="submit" class="btn btn-outline-danger btn-sm deletebtn" id="'.$data->id.'" data-toggle="modal" data-target="#modal-default"><i class="zwicon-trash"></i> Delete</button></td>

                    </tr>';
            }
        if ($request->ajax()) {
            return $html;
        }
      return view('pages.services.serviceslist',['products'=>$serviceslist]);
    }

    public function servicesedit($id){
        $service= service::where('id',$id)->first();
        return view('pages.services.addservices',['service'=>$service]);
    }

    public function deleteservices($id){
        $delete = service::where('id',$id)->first();
        if($delete->delete()){
            $image=public_path('files/'.$delete->image);
            if(file_exists($image)){
                @unlink($image);
            }
            return back()->with('success','Services Has Been deleted successfully');
        }
    }
   //abouts

   public function create_abouts(Request $request){
        $request->validate([
            'title' => 'required',
            'image' => 'required |image|mimes:jpeg,png,jpg',
            'Description'=>'required',
        ]);
        $about= new about;
        $about->title=$request->title;
        $about->description=$request->Description;
        if($request->hasfile('image')){
            $filename= Str::random(7).time().'.'.$request->file('image')->Extension();
            $image= $request->file('image')->move('files',$filename);
            $about->image=$filename ;
        }
        if($about->save()){
            return back()->with('success','About Created successfully');
        }

    }

    public function update_abouts(Request $request){
        
        $request->validate([
             'title' => 'required',
             'image' => 'image|mimes:jpeg,png,jpg',
             'Description'=>'required',
         ]);
         if(!empty($request->aboutid)){
            
             $about= about::where('id',$request->aboutid)->first();
             $about->title=$request->title;
             $about->description=$request->Description;
             if($request->hasfile('image')){
                $oldimg=public_path('files/'.$request->oldimg);
                if(file_exists($oldimg)){
                    @unlink($oldimg);
                }
                 $filename= Str::random(7).time().'.'.$request->file('image')->Extension();
                 $image= $request->file('image')->move('files',$filename);
                 $about->image=$filename ;
             }
             if($about->save()){
                 return back()->with('success','About has beed updated successfully.');
             }
         }
     }

    public function aboutslist(Request $request){
        $aboutslist= about::orderBy('id', 'DESC')->paginate(10);
        $html='';
        foreach ($aboutslist as $data) {
            $html.=' <tr>
                        <td>'.$data->title.'</td>
                        <td>'.$data->image.'</td>
                        <td>'.$data->description.'</td>
                        <td> <button type="submit" class="btn btn-theme-dark btn-sm"><i class="zwicon-eye"></i> View</button>
                              <a href="aboutsedit/'.$data->id.'"><button type="submit" class="btn btn-theme-dark btn-sm"><i class="zwicon-marker"></i> Edit</button></a>
                              <button type="submit" class="btn btn-outline-danger btn-sm deletebtn" id="'.$data->id.'" data-toggle="modal" data-target="#modal-default"><i class="zwicon-trash"></i> Delete</button></td>

                    </tr>';
            }
        if ($request->ajax()) {
            return $html;
        }
      return view('pages.abouts.aboutslist',['products'=>$aboutslist]);
    }

    public function aboutsedit($id){
        $service= about::where('id',$id)->first();
        return view('pages.abouts.addabouts',['about'=>$service]);
    }

    public function deleteabouts($id){
        $delete = about::where('id',$id)->first();
        if($delete->delete()){
            $image=public_path('files/'.$delete->image);
            if(file_exists($image)){
                @unlink($image);
            }
            return back()->with('success','Abouts Has Been deleted successfully');
        }
    }
   
}
