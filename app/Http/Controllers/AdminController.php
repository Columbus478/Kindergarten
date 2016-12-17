<?php


namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Models\User;
use Validator;
class AdminController extends Controller
{
    //

    public function __construct(){
    // $this->middleware('auth', ['except' => 'createAdmin']);
    	$this->middleware('auth', ['except' => 'createAdmin']);
  }


    
    public function createAdmin(Request $request){
  
  if ($request->isMethod('post'))
  {
   //Roles de validación
   $rules = [
    'name' => 'required|min:3|max:16|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
    'email' => 'required|email|max:255|unique:users,email',
    'password' => 'required|min:6|max:18|confirmed',
   ];
   
   
    $messages =[
                        'name.required'=>'your name is required.',
                        'name.min'=>     'name must be above 3 characters.',
                        'name.max'=>     'name must not exceed 16 characters.',
                        'name.regex'=>   'your input is not valid.',

                        'email.required'=>  'your email is required.',
                        'email.email'=>     'invalid email.',
                        'email.max'=>       'email must not exceed 255 characters.',
                        'email.unique'=>    'this email already exists.',

                        'password.required'=>  'A password is required.',
                        'password.min'=>       'password must be above 6 characters.',
                        'password.max'=>       'password must not exceed 18 characters.',
                        'password.confirmed'=> 'your password is invalid.',

                        'password_confirmation.required'=> 'your password does not match',
                    ];
   
   $validator = Validator::make($request->all(), $rules, $messages);
   
   
   if ($validator->fails()){
    return redirect()->back()->withErrors($validator);
   }
   else{ 
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->remember_token = str_random(100);
    $user->confirmToken = str_random(100);
    //Activae for administrator if credentials are correct
    $user->active = 1;
    //EActivate a column to determine if a user is an administrator or not
    $user->users = 1;
    
    if ($user->save()){
     return redirect()->back()->with('message', 'Welcome administrator, your credentials are correct');
    } else{
     return redirect()->back()->with('error', 'Sorry your credentials are not correct');
    }
   }
  }
  
  return View('admin.createadmin');
 }

 private function isAdmin(){
    if (Auth::user()->user == 1) return true;
    else return false;
   }

   public function admin(){
    if ($this->isAdmin()){
        return View('admin.admin');
    } else{
        return redirect()->back();
    }
}
}
