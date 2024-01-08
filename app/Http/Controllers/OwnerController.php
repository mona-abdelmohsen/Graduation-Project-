<?php

namespace App\Http\Controllers;

use App\Models\branch;
use App\Models\Owner_Feedback;
use App\Models\picture;
use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:تعديل البيانات', ['only' => ['owner_update']]);
        $this->middleware('permission:اصحاب السكن', ['only' => ['delete_owner']]);
        $this->middleware('permission:مستخدم', ['only' => ['owner_feedback']]);


    }
    //show owner profile
    public function owner_profile($id){

        $posts=post::where('user_id',$id)->orderBy('created_at', 'desc')->get();
        $branches=branch::all();
        $pictures=picture::all();
        $owner=User::find($id);
        $owner_rate=Owner_Feedback::where('user_id',$id)->orderby('star_rating','desc')->first();
        return view('owner_profile',compact('posts','branches','pictures','owner','owner_rate'));
      }
      //update owner profile
      public function owner_update(Request $request){
        try{
          $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required'
            ],[
              'name.required'=>'ادخل اسم المستخدم' ,
              'email.required'=>' ادخل العنوان ',
              'roles.required'=>'ادخل وسيلة التواصل ',
            
            ]);
          $owner=User::find($request->owner_id);
          if($request->hasFile('image'))
            {
                  $file = $request->file('image');  
      
                   $filename = $file->getClientOriginalName();
                  $filename = $file->storeAs($request->owner_id, $filename, 'mypublic2');
                  $owner->update([
                    'image_path'=>$filename,
              ]);
            }
          $owner->update([
                'name'=>$request->name,
                'address'=>$request->address,
                'phone'=>$request->phone,
          ]);
          
          toastr()->success('تم تحديث البيانات بنجاح');
            return back();
        
        }
       catch (\Exception $e) {
      
        toastr()->error('لم يتم تحديث البيانات ');
      
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }
    }
    //delet owner by manager
    public function delete_owner($id){
        User::find($id)->delete();
        toastr()->success('تم حذف البيانات بنجاح');
    return back();
    }
    //make feedback to owner
    public function owner_feedback(Request $request){
        if($request->rating ){
          $review = new Owner_Feedback();
            $review->star_rating = $request->rating;
            $review->user_id=$request->user_id;
            $review->save();
            toastr()->success('تم إضافة البيانات بنجاح');
        }
            return redirect()->back();
    }
   

}
