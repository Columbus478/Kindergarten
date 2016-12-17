<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\user;
use Validator;
use App\comments;
use Hash;

class UserController extends Controller
{
    //
    public function _construct()
    {
    	 $this->middleware('auth');
    }
    public function user()
    {
    	return view('user.user');
    }

    public function profile(){

    	return view('user.profile');
    }
  public function passwordForm()
  {
    return view('user.password');
  }
    // public function updateprofile(Request $request)
    // {
    //  return redirect('user');
    // }
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
 return redirect()->back()->with('status','Your comment has been published.');
    }

    public function deleteComment(Request $request)
    {
        $rules =[
         'id_comment' => 'integer',
        ];
        $messages = [
        'id_comment.integer' => 'Input an integer value.',
        ];
        $validator = Validator::make($request->only('id_comment'),$rules);

        if($validator->fails()){
            return redirect()->back()->with('errors','Error in deleting this comment');
        }
        else{

            if(comments::where('id','=',$request->id_comment)
                ->where('id_user','=', Auth::user()->id)->delete()
                ){
                return redirect()->back()->with('status','Comment successfully deleted.');
            }else{

                return redirect()->back()->with('errors','Error in deleting this comment');
            }

        }
    }

    public function editComment(Request $request){

    $rules = ['id_comment' => 'integer'];
    $comment = e($request->comment);

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()){

        return redirect()->back()->with('error', 'Ha ocurrido un error');
    } else{
        if (Comments::where('id', '=', $request->id_comment)
                ->where('id_user', '=', Auth::user()->id)
                ->update(['comment' => $comment])){
            return redirect()->back()->with('status', 'Comment successfully edited.');
        }else{
            return redirect()->back()->with('errors', 'Error in editing this comment');
        }
    }
}
 public function dashboard()
 {
    return view('user.dashboard');
 }

 protected function downloadFile($src)
 {
    if(is_file($src)){
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $content_type = finfo_file($finfo, $src);
        finfo_close($finfo);
        $fileName = basename($src).PHP_EOL;
        $size = filesize($src);
        header("Content-Type: $content_type");
        header('Content-Desposition: attachment, filename = $fileName');
        header('Content-Transfer-Encoding: binary');
        header('Content-lenght: $size');
        readfile($src);
        return true;
    }else{

        return false;
    }
 }

 public function download(){
    if(!$this->downloadFile(app_path().'/files/Transcript_SE03446.pdf')){
        return redirect()->back();
    }
 }

}
