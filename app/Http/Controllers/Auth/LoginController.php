<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    } 

    public function login(Request $request){
        $this->validate($request, [
              'email'   => 'required|email',
              'password' => 'required|min:6'
          ]);
              if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                  $user = Auth::User();
                    if(!empty($user)){
                        Session::put('user', $user);
                        return redirect()->intended('home');
                    }
                       
            }else {
                return back()->with('error','email and password dosnot exit plesase trye again!');
            }
    }
    public function logout(Request $request ) {
        $request->session()->flush();
        Auth::logout();
       
        return redirect('login');
    }
}
