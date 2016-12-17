<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Mail;
use Auth;
use DateTime;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    protected $redirectpath ='User';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware($this->guestMiddleware(), ['except' => 'getLogout']);
        $this->middleware('guest', ['except' => 'getLogout']);
        return redirect('auth.login');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    
   
    public function login(){
        return view('auth.login');
    }
   public function getRegister()
   {
     return view('auth/register');
   }
    public function postRegister(Request $request) {
          $rules =[
                     'name' => 'required|min:3|max:16|regex:/^[a-zaeiou\s]+$/i',
                     'address' => 'required|min:3|max:255',
                     'email' => 'required|email|max:255|unique:User,email',
                     'city' => 'required|min:3|max:255',
                     'sex' => 'required',                     

                     'username' => 'required|min:3|max:16|regex:/^[a-zaeiou\s]+$/i',
                     'password' => 'required|min:6|max:18|confirmed',
                     'confirmpassword' => 'required',

                     'agree' => 'required',
                  ];

         $messages =[
                        'name.required'=>'your name is required.',
                        'name.min'=>     'name must be above 3 characters.',
                        'name.max'=>     'name must not exceed 16 characters.',
                        'name.regex'=>   'your input is not valid.',

                        'address.required'=>  'your address is required.',
                        'address.min'=>     'invalid address.',
                        'address.max'=>       'address must not exceed 255 characters.',

                        'email.required'=>  'your email is required.',
                        'email.email'=>     'invalid email.',
                        'email.max'=>       'email must not exceed 255 characters.',
                        'email.unique'=>    'this email already exists.',

                        'city.required'=>  'your city is required.',
                        'city.min'=>     'invalid city.',
                        'city.max'=>       'city must not exceed 255 characters.',

                        'sex.required' => 'Please, choose your gender',

                        'password.required'=>  'A password is required.',
                        'password.min'=>       'password must be above 6 characters.',
                        'password.max'=>       'password must not exceed 18 characters.',
                        'password.confirmed'=> 'your password is invalid.',

                        'confirmpassword.required'=> 'your password does not match',

                        'agree.required' => 'Please confirm your agreement.',
                    ];

                    $validator = Validator::make($request->all(),$rules,$messages);

                    if($validator->fails()){
                        return redirect('auth/register')
                        ->withErrors($validator,'error_message')
                        ->withInput();
                    }else{
                        $user = new User;
                        $user->name = $request->name;
                        $user->address = $request->address;
                        $data['email'] = $user->email = $request->email;
                        $user->city = $request->city;
                       // $user->sex =$request->has('sex')? $request->male: $request->female;
                        //$user->sex = Input::get('sex');
                        $data['username'] = $user->username = $request->username;
                        $user->password = bcrypt($request->password);
                        $data['confirmToken'] = $user->confirmToken = str_random(100);
                        $user->remember_token = str_random(100);                        
                        $user->agree = Input::get('agree');                      
                        $user->save();
                        Mail::send('emails.register',['data' => $data], function($mail) use($data){
                            $mail->sender('samoc.bana@gmail.com','Kindergarten.Nobi.vn.');
                            $mail->from('samoc.bana@gmail.com','Kindergarten.Nobi.vn..');
                            $mail->subject('Confirmation of Registration to Kindergarten.Nobi.vn');
                            $mail->to($data['email'], $data['username']);
                        });
                       
                        return redirect('auth/login')
                        ->with('success','Your registration was successful.\n Please Check your Email to Confirm your Registration. Thanks');
        }
                    
    }



    public function confirmRegister($email, $confirmToken)
    {
        $user = new User;
        $the_user = $user->select()->where('email','=',$email)
        ->where('confirmToken', '=',$confirmToken)->get();

        if(count($the_user)>0)
        {
            $active = 1;
            $now =  date("Y-m-d H:i:s");
            $confirmToken = str_random(100);
            $user->where('email','=',$email)
            ->update(['active' => $active, 'confirmToken' => $confirmToken, 'last_login' => $now]);

            return redirect('home/adminhome')
                        ->with(['message'=>'Welcome '.$the_user[0]['name'].' .This is your Session.']);
        }else{
             return redirect('');
        }

    }

     public function postLogin(Request $request)
     {
        //$DATE = date();
        //$now =  date("Y-m-d H:i:s",strtotime(str_replace('/','-',$DATE)));
           
            if(Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
                'active' => 1,
                'last_login' => date("D-m-y H:i:s"),               
                ],
                $request->has('remember')
                )){

                return redirect()->intended($this->redirectpath());

            }
            else{
                $rules = [
                 'email' => 'required|email',
                 'password' => 'required',                 
                ];

                $messages =[
                 'email.required' => 'An Email is required',
                 'email.email' => 'You email is incorrect',
                 'password' => 'your password is required',
                ];

                $validator = Validator::make($request->all(),$rules,$messages);

                return redirect('auth/login')
                ->withErrors($validator)
                ->withInput()
                ->with('message','Error in creating your session. Please Confirm your Registration or Sign up.');
            }


     }
}
