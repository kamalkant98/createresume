<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\subscription_plan;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Razorpay\Api\Api;
use Illuminate\Support\Str;
use Session;
use Redirect;
class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {   
        $users= User::where('usertype','2')->orderBy('id', 'DESC')->paginate(10);

        $html='';
     
        foreach ($users as $user) {
           
            $kk=json_decode($user->permissions,true);
              
                
              /* $data='';
                if(!in_array(2,$kk)){
                    $data.= ' <span class="badge badge-success">addproduct</span>';
                }else{
                    $data.= ' <span class="badge badge-danger">addproduct</span>';
                }if(!in_array(3,$kk)){
                    $data.= ' <span class="badge badge-success">deleteproduct</span>';
                }else{
                    $data.= ' <span class="badge badge-danger">deleteproduct</span>';
                } if(!in_array(4,$kk)){
                    $data.= ' <span class="badge badge-success">updateproduct</span>';
                }else{
                    $data.= ' <span class="badge badge-danger">updateproduct</span>';
                   
                }*/
                
            $html.=' <tr>
                        <td>'.$user->username.'</td>
                        <td>'.$user->name.'</td>
                        <td>'.$user->email.'</td>
                        <td>'.$user->telephone.'</td>
                     
                        <td>'.date('d F,Y', strtotime($user->created_at)).'</td>
                        <td class="td-actions text-right">
                            <div class="dropdown-demo">
                                <div class="dropdown">
                                    <button class="btn btn-theme dropdown-toggle" data-toggle="dropdown">Opestions</button>
                                    <div class="dropdown-menu">
                                        <a href="user/'.$user->id.'/edit" class="dropdown-item">Edit</a>
                                        <input type="hidden" class="per'.$user->id.'" value="'.$user->permissions.'">
                                        <a class="dropdown-item permissonbtn" data-toggle="modal" id="'.$user->id.'" data-target="#modal-scrollable">Permission</a>
                                       
                                    </div>
                                </div>
                            </div>
                        </td>

                    </tr>';
            }
        if ($request->ajax()) {
            return $html;
        }
        return view('users.index',['users'=>$users]);
    }

    public function edit($user){
        $user= User::where('id',$user)->first();        
        return view('users.update',['user'=>$user]);
    }

    public function update(Request $request,$user){

        $request->validate([
            'name' =>'required|string|max:255',
            'username' =>'required|string|max:255',
            'telephone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user
        ]);
           

        $update= User::find($user);
        $update->name=$request->name;
        $update->email=$request->email;
        $update->username=$request->username;
        $update->telephone=$request->telephone;
        if($update->save()){
            return back()->with('success','User Update succesfully.');
        }
    }

    public function setpermission(Request $request,$id){
        $permission= User::where('id',$id)->first();
      
        if(isset($request->permission) && !empty($request->permission)){
            /**/$permissionarr='';
            $permissionarr.=implode(',',$request->permission);
            $permission->permissions=$permissionarr; 
        //  $permission->permissions=json_encode($request->permission);
            
           // $permission->permissions = json_encode($request->permission, JSON_FORCE_OBJECT);
           
        }else{
            $permission->permissions='';
        }
        
        if($permission->save()){
            return redirect('user')->with('success','Permission has been updated successfully.');
        }
        
    }


    public function add_Subscription_plan(Request $request){
         
        $request->validate([
            'title' =>'required|string|max:255',
            'Amount' =>'required|string|max:255',
            'Plan_Duration_day' => 'required_without_all:Plan_Duration_week,Plan_Duration_month,Plan_Duration_year,',
            'Plan_Duration_week' => 'required_without_all:Plan_Duration_day,Plan_Duration_month,Plan_Duration_year',
            'Plan_Duration_month' => 'required_without_all:Plan_Duration_day,Plan_Duration_week,Plan_Duration_year',
            'Plan_Duration_year' => 'required_without_all:Plan_Duration_day,Plan_Duration_week,Plan_Duration_month',
            'Description'=>'required|string|max:255',
        ]);
        if(!empty($request->planid)){
           $plan= subscription_plan::where('id',$request->planid)->first();
        }else{
            $plan= new subscription_plan;
            $plan->user_id=session('user')->id;
        }
      
        $plan->title=$request->title;
        $plan->amount=$request->Amount;
        $plan->description=$request->Description;
        $plan->plan_duration_day=$request->Plan_Duration_day;
        $plan->plan_duration_week=$request->Plan_Duration_week;
        $plan->plan_duration_month=$request->Plan_Duration_month;
        $plan->plan_duration_year=$request->Plan_Duration_year;
    
        if($plan->save()){
            return back()->with('success','Subscription add succesfully .');
        }
           
    }

    public function planlist(){
       $plans= subscription_plan::all();
       return view('users.planlist',['plans'=>$plans]);
    }
    public function editplan($id){
        $editplan=subscription_plan::where('id',$id)->first();
         return view('users.Create_Subscription_plan',['plan'=>$editplan]);
    }

    public function Subscription_plan(){
       
         $allplans=subscription_plan::all();
        return view('pages.plans',['plans'=>$allplans]); 
    }

  

    public function select_plan($id){
        $plan= subscription_plan::where('id',$id)->first();
        $user= User::where('id',session('user')->id)->first();
        return view('pages.plananduserdetails',['plan'=>$plan,'user'=>$user]);
    }

    public function initiate(Request $request){
        $name=$request->name;
        $email=$request->email;
        $amount=$request->amount;
        $contect=$request->telephone;
        $plan=$request->planname;
        $recepit=Str::random('20');
        $api= new Api('rzp_test_8AroQYqC7Jg7WF','oEgEuXrXbBXNb5GQHdati6m1');

        $order  = $api->order->create([
            'receipt'         => $recepit,
            'amount'          => $amount *100, // amount in the smallest currency unit
            'currency'        => 'INR',// <a href="/docs/payment-gateway/payments/international-payments/#supported-currencies" target="_blank">See the list of supported currencies</a>.)
          ]);
        $orderId=$order['id'];
        
        
        $saveid= User::where('id',session('user')->id)->first();

        $saveid->subscription_amount= $amount;
        $saveid->payment_id=$orderId;
        $saveid->subscription_plan=$plan;
        $saveid->save();
        return view('pages.paymentwithrozorpay',['userdata'=>$saveid]); 
    }
    public function pay(Request $request){
      
      
            $data = $request->all();
            $user = User::where('payment_id', $data['razorpay_order_id'])->first();
            $user->payment_done = true;
            $user->razorpay_id = $data['razorpay_payment_id'];
    
            $api = new Api('rzp_test_8AroQYqC7Jg7WF', 'oEgEuXrXbBXNb5GQHdati6m1');
            
    
            try{
            $attributes = array(
                 'razorpay_signature' => $data['razorpay_signature'],
                 'razorpay_payment_id' => $data['razorpay_payment_id'],
                 'razorpay_order_id' => $data['razorpay_order_id']
            );
            $order = $api->utility->verifyPaymentSignature($attributes);
            $success = true;
        }catch(SignatureVerificationError $e){
             $succes = false;
        }
        if($success){
            $user->save();
            return redirect('/')->with('success','congratulations you have subscriptions you have all control .');
        }else{
    
            return redirect('/')->with('error','something went worng,please try again ');
        }
    
    }
}
