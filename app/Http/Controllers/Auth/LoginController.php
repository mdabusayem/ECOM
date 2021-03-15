<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Notifications\Verify;
use App\user;
use Auth;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
        ]);

        $user=User::where('email',$request->email)->first();
        if(!is_null($user))
        {
            if ($user->status==1) {

                if(Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)) {
                    //dd($user);
                    return redirect()->intended(route('index'));
                }
                else
                {
                   session()->flash('st_errors','Given Password is incorrect.');
                    return redirect()->route('login');
                }
            }
            else{
                if(!is_null($user))
                {
                    $user->notify(new Verify($user));
                    session()->flash('success','A New Confirmation email has sent to you.Please Check.');
                    return redirect('/');
                }
            }
        }
        else{
                   // session()->flash('errors','Please register first.');
                    return redirect()->route('login');
                
            }
        

    }
}
