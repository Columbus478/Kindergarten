<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\myFormular;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Schools;
use App\Parents;
use App\Teachers;
use App\Healths;
use App\Diaries;

class PagesController extends Controller
{
    //
    public function contact()
    {
        return view('pages.contact');
    }
    public function menus()
    {
    	return view('pages.menus');
    }
    public function classes()
    {
        return view('pages.class');
    }
   public function activityOfClasses()
    {
        return view('pages.activityOfClasses');
    }
    public function babies()
    {
        return view('pages.babies');
    }
    public function comment()
    {
        return view('pages.comment');
    }
    public function diaries()
    {
        return view('pages.diaries');
    }

        public function createDiary(Request $request){         

                    $validator = Validator::make($request->all(),array(
                     'diaryDateTime' => 'required',
                     'detail' => 'required',
                     'notice' => 'required',                     
                     'image' => 'required|mimes:jpg,jpeg,png,jif |max:1024*1024*1'));
                 if($validator->fails()){
                        return redirect()->back()
                        ->with('error_code', 5)
                        ->withErrors($validator,'error_message')
                        ->withInput();
                    }else{

                   $diary = new Diaries;
                        $DiaryTime = $request->diaryDateTime;
                        $diary->DiaryDateTime =  date("D-m-y H:i:s",strtotime(str_replace('/','-',$DiaryTime)));
                        $diary->BabyID = Input::get('babyname');
                        $diary->Detail = $request->detail;
                        $diary->Notice = $request->notice;
                        $diary->Read = Input::get('read');
                         $imagefile = str_random(10).'-'.$request->file('image')->getClientOriginalName();
                         $request->file('image')->move('diaryimage', $imagefile);  
                        $diary->ImageList = 'diaryimage/'.$imagefile;                                    
                        $diary->status = Input::get('status');                      
                      
                       $diary->save();
                        return redirect()->back()
                        ->with('status','Diary information was successfully added.');
                        }        
    
}
     

      public function deleteDiary(Request $request)
    {
        $rules =[
         'id_diary' => 'integer',
        ];
        $messages = [
        'id_diary.integer' => 'Input an integer value.',
        ];
        $validator = Validator::make($request->only('id_diary'),$rules);

        if($validator->fails()){
            return redirect()->back()->with('error','Failed to deleting this diary');
        }
        else{

            if(Diaries::where('DiaryID','=',$request->id_diary)
                //->where('id_user','=', Auth::user()->id)
                ->delete()
                ){
                return redirect()->back()->with('status','Diary successfully deleted.');
            }else{

                return redirect()->back()->with('error','Error in deleting this diary');
            }

        }
    }

    public function editDiary(Request $request){

    $rules = ['id_diary' => 'integer'];
                       $DiaryTime = $request->diaryDateTime;
                        $DiaryDateTime =  date("D-m-y H:i:s",strtotime(str_replace('/','-',$DiaryTime)));
                        $BabyID = Input::get('babyname');
                        $Detail = $request->detail;
                        $Notice = $request->notice;
                        $Read = Input::get('read');
                    $imagefile = str_random(10).'-'.$request->file('image')->getClientOriginalName();
                        $request->file('image')->move('diaryimage', $imagefile);  
                        $ImageList = 'diaryimage/'.$imagefile;                                    
                        $Status = Input::get('status');

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()){

        return redirect()->back()->with('error', 'Failed in editting this diary');
    } else{
        if (Diaries::where('DiaryID', '=', $request->id_diary)               
                ->update([
                    'DiaryDateTime' => $DiaryDateTime,
                    'BabyID' => $BabyID,
                    'Detail' => $Detail,
                    'Notice' => $Notice,
                    'Read' => $Read,
                    'ImageList' => $ImageList,                    
                    'Status' => $Status,   
                    ])){
            return redirect()->back()->with('status', 'Diary successfully edited.');
        }else{
            return redirect()->back()->with('error', 'Error in editing this diary');
        }
    }
}
    public function health()
    {
        return view('pages.health');
    }

         public function createHealth(Request $request){

                    $validator = Validator::make($request->all(),array(
                     'examinedate' => 'required',
                     'height' => 'required',                     
                     'weight' => 'required',
                     'note' => 'required'));

                    if($validator->fails()){
                        return redirect()->back()
                        ->with('error_code', 5)
                        ->withErrors($validator,'error_message')
                        ->withInput();
                    }else{

         $health = new Healths;
                         $Date = $request->examinedate;
                        $health->ExamineDate =  date("Y-m-d",strtotime(str_replace('/','-',$Date)));
                        $health->Height = $request->height;
                        $health->Weight = $request->weight;
                        $health->Note = $request->note; 
                        $health->BabyID = Input::get('babyname'); 

                        $health->save();
                        return redirect()->back()
                        ->with('status','Health information was successfully added.');
                        }    
    
     }


      public function deleteHealth(Request $request)
    {
        $rules =[
         'id_health' => 'integer',
        ];
        $messages = [
        'id_health.integer' => 'Input an integer value.',
        ];
        $validator = Validator::make($request->only('id_health'),$rules);

        if($validator->fails()){
            return redirect()->back()->with('error','Error in deleting this health information');
        }
        else{

            if(Healths::where('HealthID','=',$request->id_health)
                //->where('id_user','=', Auth::user()->id)
                ->delete()
                ){
                return redirect()->back()->with('status','Health information was successfully deleted.');
            }else{

                return redirect()->back()->with('error','Error in deleting this health information');
            }

        }
    }

    public function editHealth(Request $request){

    $rules = ['id_health' => 'integer'];
                        $Date = $request->examinedate;
                        $ExamineDate =  date("Y-m-d",strtotime(str_replace('/','-',$Date)));
                        $Height = $request->height;
                        $Weight = $request->weight;
                        $Note = $request->note; 
                        $BabyID = Input::get('babyname'); 
    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()){

        return redirect()->back()->with('error', 'Failed in editting this health information');
    } else{
        if (Healths::where('HealthID', '=', $request->id_health)               
                ->update([
                    'ExamineDate' => $ExamineDate,
                    'Height' => $Height,
                    'Weight' => $Weight,
                    'Note' => $Note,
                    'BabyID' => $BabyID,         

                    ])){
            return redirect()->back()->with('status', 'Health information was successfully edited.');
        }else{
            return redirect()->back()->with('error', 'Error in editing this health information');
        }
    }
}
    public function notification()
    {
        return view('pages.notification');
    }

    // Parents
    public function parents()
    {
        return view('pages.parents');
    }

     public function createParent(Request $request){

                    $validator = Validator::make($request->all(),array(
                     'parentName' => 'required|min:3|max:16|regex:/^[a-zaeiou\s]+$/i',
                     'address' => 'required|min:3|max:255',                     
                     'phone' => 'required',
                     'email' => 'required|email|max:255|unique:parents,email',             

                     'password' => 'required|min:6|max:18',
                     'facebookid' => 'required',
                     'skypeid' => 'required',
                     'birthdate' => 'required',
                     'status' => 'required',
                     'schoolname' => 'required'));

                    if($validator->fails()){
                        return redirect()->back()
                        ->with('error_code', 5)
                        ->withErrors($validator,'error_message')
                        ->withInput();
                    }else{

         $parent = new Parents;
                      $parent->Parentname = $request->parentName;
                        $parent->address = $request->address;
                        $parent->phone = $request->phone;
                        $parent->email = $request->email;
                        $parent->password = bcrypt($request->password);
                        $parent->facebookId = $request->facebookid;
                        $parent->skypeid = $request->skypeid;
                        $DOB = $request->birthdate;
                        $parent->birthdate =  date("DD-MM-YYYY",strtotime(str_replace('-','-',$DOB)));
                        $parent->status = Input::get('status');                        
                        $parent->LastLogon = date("D-m-y H:i:s");
                        $parent->SchoolID = Input::get('schoolname');                                
                       
                       $parent->save();
                        return redirect()->back()
                        ->with('status','Parent was successfully added.');
                        }          
    

     }


      public function deleteParent(Request $request)
    {
        $rules =[
         'id_parent' => 'integer',
        ];
        $messages = [
        'id_parent.integer' => 'Input an integer value.',
        ];
        $validator = Validator::make($request->only('id_parent'),$rules);

        if($validator->fails()){
            return redirect()->back()->with('error','Error in deleting this comment');
        }
        else{

            if(Parents::where('ParentID','=',$request->id_parent)
                //->where('id_user','=', Auth::user()->id)
                ->delete()
                ){
                return redirect()->back()->with('status','Parent successfully deleted.');
            }else{

                return redirect()->back()->with('error','Error in deleting this parent');
            }

        }
    }

    public function editParent(Request $request){

    $rules = ['id_parent' => 'integer'];
                        $Parentname = $request->parentName;
                        $address = $request->address;
                        $phone = $request->phone;
                        $email = $request->email;
                        $facebookid = $request->facebookid;
                        $skypeid = $request->skypeid;
                        $DOB = $request->birthdate;
                        $birthdate =  date("D-m-y",strtotime(str_replace('-','-',$DOB)));
                        $status = Input::get('status');                        
                        $SchoolID = Input::get('schoolname');

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()){

        return redirect()->back()->with('error', 'Failed in editting this parent');
    } else{
        if (Parents::where('ParentID', '=', $request->id_parent)               
                ->update([
                    'ParentName' => $Parentname,
                    'Address' => $address,
                    'Phone' => $phone,
                    'Email' => $email,
                    'Facebookid' => $facebookid,
                    'Skypeid' => $skypeid,
                    'BirthDate' => $birthdate,
                    'Status' => $status,
                    'SchoolID' => $SchoolID,

                    ])){
            return redirect()->back()->with('status', 'Parent wincache_scache_meminfo(oid) successfully edited.');
        }else{
            return redirect()->back()->with('error', 'Error in editing this parent');
        }
    }
}
   // SCHOOL PAGE //
    public function schools()
    {
        return view('pages.schools');
    }
      public function createSchool(Request $request){
         
                    $validator = Validator::make($request->all(),array(
                     'schoolname' => 'required|min:3|max:16|regex:/^[a-zaeiou\s]+$/i',
                     'email' => 'required|email|max:255|unique:schools,email',
                     'address' => 'required|min:3|max:255', 
                     'website' => 'required',                     
                     'phone' => 'required',
                     'contactname' => 'required|min:3|max:16|regex:/^[a-zaeiou\s]+$/i', 
                     'contactphone' => 'required',            
                     'password' => 'required|min:6|max:18',                     
                     'logo' => 'required'));

                    if($validator->fails()){
                        return redirect()->back()
                        ->with('error_code', 4)
                        ->withErrors($validator,'error_message')
                        ->withInput();
                    }else{

         $school = new Schools;
                        $school->SchoolName = $request->schoolname;
                        $school->Email = $request->email;
                        $school->Address = $request->address;
                        $school->Website = $request->website;
                        $school->Phone = $request->phone;                       
                        $school->ContactName = $request->contactname;
                        $school->ContactPhone = $request->contactphone;
                        $school->Password = bcrypt($request->password);
                        $school->Logo = $request->logo;                                         
                        $school->Status = Input::get('status'); 

                       $school->save();
                        return redirect()->back()
                        ->with('status','School was successfully added.'); 
                        }

     }


      public function deleteSchool(Request $request)
    {
        $rules =[
         'id_school' => 'integer',
        ];
        $messages = [
        'id_school.integer' => 'Input an integer value.',
        ];
        $validator = Validator::make($request->only('id_school'),$rules);

        if($validator->fails()){
            return redirect()->back()->with('error','Error in deleting this comment');
        }
        else{
            if(Parents::where('SchoolID','=',$request->id_school)
                //->where('id_user','=', Auth::user()->id)
                ->delete()
                ){
                return redirect()->back()->with('status','School was successfully deleted.');
            }else{

                return redirect()->back()->with('error','Error in deleting this parent');
            }

        }
    }

    public function editSchool(Request $request){

    $rules = ['id_school' => 'integer'];
    
                         $SchoolName = $request->schoolname;
                        $Email = $request->email;
                        $Address = $request->address;
                        $Website = $request->website;
                        $Phone = $request->phone;                       
                        $ContactName = $request->contactname;
                        $ContactPhone = $request->contactphone;                        
                        $Logo = $request->logo;                                         
                        $Status = Input::get('status');
    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()){

        return redirect()->back()->with('error', 'Failed in editting this school.');
    } else{
        if (Schools::where('SchoolID', '=', $request->id_school)               
                ->update([
                    'SchoolName' => $SchoolName,
                    'Email' => $Email,
                    'Address' => $Address,
                    'Website' => $Website,
                    'Phone' => $Phone,
                    'ContactName' => $ContactName,
                    'ContactPhone' => $ContactPhone,
                    'Logo' => $Logo,
                    'Status' => $Status,

                    ])){
            return redirect()->back()->with('status', 'School successfully edited.');
        }else{
            return redirect()->back()->with('error', 'Error in editing this school');
        }
    }
}
   // TEACHER PAGE
    public function teacher()
    {
        return view('pages.teacher');
    }
    public function createTeacher(Request $request){

                    $validator = Validator::make($request->all(),array(
                    'teacherName' => 'required|min:3|max:16|regex:/^[a-zaeiou\s]+$/i',
                     'address' => 'required|min:3|max:255', 
                     'email' => 'required|email|max:255|unique:teachers,email',
                     'password' => 'required|min:6|max:18',
                     'birthdate' => 'required',
                     'facebookid' => 'required',
                     'skypeid' => 'required',
                     'classname' => 'required',                     
                     'publicinformation' => 'required'));

                    if($validator->fails()){
                        return redirect()->back()
                        ->with('error_code', 3)
                        ->withErrors($validator,'error_message')
                        ->withInput();
                    }else{

         $teacher = new Teachers;
                      $teacher->TeacherName = $request->teacherName;
                        $teacher->Address = $request->address;                        
                        $teacher->Email = $request->email;
                        $teacher->Password = bcrypt($request->password);
                        $DOB = $request->birthdate;
                        $teacher->birthdate =  date("Y-m-d",strtotime(str_replace('/','-',$DOB)));
                        $teacher->facebookId = $request->facebookid;
                        $teacher->skypeid = $request->skypeid;                                       
                        $teacher->ClassID = Input::get('classname');
                         $teacher->PublicInformation = $request->publicinformation;
                        $teacher->Status = Input::get('status');
                       
                       $teacher->save();
                        return redirect()->back()
                        ->with('status','Teacher was successfully added.');        
                        }   

     }


      public function deleteTeacher(Request $request)
    {
        $rules =[
         'id_teacher' => 'integer',
        ];
        $messages = [
        'id_teacher.integer' => 'Input an integer value.',
        ];
        $validator = Validator::make($request->only('id_parent'),$rules);

        if($validator->fails()){
            return redirect()->back()->with('error','Error in deleting this teacher');
        }
        else{

            if(Teachers::where('TeacherID','=',$request->id_teacher)
                //->where('id_user','=', Auth::user()->id)
                ->delete()
                ){
                return redirect()->back()->with('status','Teacher successfully deleted.');
            }else{

                return redirect()->back()->with('error','Error in deleting this teacher');
            }

        }
    }

    public function editTeacher(Request $request){

    $rules = ['id_teacher' => 'integer'];

                        $TeacherName = $request->teacherName;
                        $Address = $request->address;                        
                        $Email = $request->email;
                        $Password = bcrypt($request->password);
                        $DOB = $request->birthdate;
                        $birthdate =  date("Y-m-d",strtotime(str_replace('/','-',$DOB)));
                        $facebookId = $request->facebookid;
                        $skypeid = $request->skypeid;                                       
                        $ClassID = Input::get('classname');
                        $PublicInformation = $request->publicinformation;
                        $Status = Input::get('status');

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()){

        return redirect()->back()->with('error', 'Failed in editting this teacher');
    } else{
        if (Teachers::where('TeacherID', '=', $request->id_teacher)               
                ->update([
                    'TeacherName' => $TeacherName,
                    'Address' => $Address,
                    'Email' => $Email,
                    'BirthDate' => $birthdate,
                    'FacebookId' => $facebookId,
                    'Skypeid' => $skypeid,
                    'PublicInformation' => $PublicInformation,                   
                    'ClassID' => $ClassID,
                    'Status' => $Status,
                    ])){
            return redirect()->back()->with('status', 'Teacher was successfully edited.');
        }else{
            return redirect()->back()->with('error', 'Error in editing this teacher');
        }
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
