<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use App\comments;
use Auth;
use Hash;
class UserController extends Controller
{

	 protected $redirectTo = '/';
   public function __construct()
    {
        $this->middleware('auth');
    }

    public function user()
    {
    	return view('user.user');
    }

    public function profile()
    {
    	return view('user.profile');
    }

  public function updateProfile(Request $request)
    {
    	$rules =[
    	 'image' => 'required|image|max:1024*1024*1',
    	];

    	$messages =[
    	'image.required ' => 'An imgae is required', 
    	'image.image' => 'invalid image file. Please upload image formats',
    	'image.max' => 'The image size must not exceed 1MB.',
    	];

    	$validator = Validator::make($request->all(), $rules, $messages);
    	if($validator->fails())
    	{
    		return view('user/profile')->withErrors($validator);
    	}
    	else{
    		$name = str_random(30).'-'.$request->file('image')->getClientOriginalName();
    		$request->file('image')->move('profiles', $name);
    		$user = new User;
    		$user->where('email', '=' , Auth::user()->email)
    		->update(['profiles' => 'profiles/'.$name]);
    		return redirect('user')->with('status' , 'your profile is updated successfully.');
    	}
    	
    }

    public function passwordForm() 
    {
    	return view('user.password');
    }

    public function updatePassword(Request $request){
 
           $rules =[
                     'mypassword' => 'required',
                     'password' => 'required|min:6|max:18|confirmed',
                  ];

         $messages =[
                        'mypassword.required' => 'Your password is required.',
                        'password.required'=>  'A password is required.',
                        'password.min'=>       'password must be above 6 characters.',
                        'password.max'=>       'password must not exceed 18 characters.',
                        'password.confirmed'=> 'your password is invalid.',                        
                    ];

               $validator = Validator::make($request->all(), $rules, $messages);
              if($validator->fails())
    	{
    		return view('user/password')->withErrors($validator);
    	}
    	else{
    		if(Hash::check($request->mypassword, Auth::user()->password)){
               $user = new User;
               $user->where('email', '=' , Auth::user()->email)
    		->update(['password'=> bcrypt($request->password)]);
    		return redirect('user')->with('status' , 'your password is updated successfully.');
    		}
    		else{

    			return redirect('user/password')->with('message' , 'your credentials are incorrect.');
    		}
    		
    		
    	}
    }

    public function createComment(Request $request)
    {
   $comment = e($request->comment);
   $date = date('Y-m-d');
   $time = date('H:m:s');
   comments::insert([
   	'comment' => $comment,
   	'id_user' => Auth::user()->id,
   	'date' => $date,
   	'time' => $time,
   	]);
 return redirect('home')->with('status','Your comment has been published.');
    }
}