<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\myFormular;
use Validator;
use App\comments;
use App\users;

class HomeController extends Controller
{
    //
    public function home()
    {
    	return view('home.adminhome');
    }

    public function menus()
    {
    	return view('pages.menus');
    }

    public function search($search)
    {
       $search = urldecode($search);
       $comment = comments::select()
                 ->where('comment','LIKE', '%'.$search.'%')
                 ->orderby('id','desc')
                 ->paginate(3);

                 if(count($comment)==0)
                 {
                    return view('home.search')
                                ->with('message','No result found for your search.')
                                ->with('search',$search);
                 }else{
                    return view('home.search')
                    ->with('comments',$comment)
                    ->with('search',$search);
                 }

    }

    public function user($id){
         $user = User::select()
         ->where('id','=',$id)
         ->first();
         if(count($user)==0){
            return redirect()->back();
         }else{
            return view('home.user')->with('user',$user);
         }
    }

    
}
