<?php

namespace App\Http\Controllers\Auth;
use App\Mail\VerifyEmail;
use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   /*     protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255','unique:users'],
            'telephone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }  */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
   /*   protected function create(array $data)
    {
       
        
        return User::create([
            'usertype'=>'2',
            'payment_done'=>'0',
            'name' => $data['name'],
            'email'=>$data['email'],
            'telephone'=>$data['telephone'],
            'username'=>$data['username'],
            'password'=> hash::make($data['password']),
           
        ]);
    }  */
  //   public function register(Request $request){
      /*   $details = [
            'name' => 'kamal',
            'body' => 'This is for testing email using smtp'
        ];
         \Mail::send('email.emailverify',['kamal'=>$details],function($message){
                $message->to('jitendrakumarsukhadia@gmail.com','thewebtech')
                    ->subject('Email verify');
        }); */
       
      
       
    /*     dd("Email is Sent."); */
      /*   $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255','unique:users'],
            'telephone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]); 
        $data=$request->all();
         Validator::make($data,[
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255','unique:users'],
            'telephone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);   */
    //}


   public function register(request $request){
     
        $validator =   Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255','unique:users'],
            'telephone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
          ]);
        if ($validator->fails()) {
            return  back()->withErrors($validator); //Sends back only room name
        } else {

                $user= new User;
              
                $user->usertype='2';
                $user->payment_done='0';
                $user->name = $request->name;
                $user->email=$request->email;
                $user->telephone=$request->telephone;
                $user->username=$request->username;
                $user->password= hash::make($request->password);
                if($user->save()){
                    return redirect('login')->with('info','please check your email '.$request->email.' address for verify your email');
                }
               
           
        }
    }

        /* $request->validate([
           
        ]); */
           /*   $user_id = session('user')->id;
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
        } */
           
        
   // }
}
