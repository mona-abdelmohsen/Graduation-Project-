<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\NewManager;
use App\Models\branch;
use App\Models\picture;
use App\Models\post;
use App\Models\region;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
function __construct()
    {
         $this->middleware('permission:المستخدمين', ['only' => ['index','store','create','show','edit','update','destroy']]);

    }
public function index(Request $request)
{
$data = User::orderBy('id','DESC')->paginate(5);
return view('users.index',compact('data'))
->with('i', ($request->input('page', 1) - 1) * 5);
}


/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
$roles = Role::pluck('name','name')->all();

return view('users.create',compact('roles'));

}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{

$this->validate($request, [
'name' => 'required',
'email' => 'required|email|unique:users,email',
'password' => 'required|same:confirm-password',
'roles_name' => 'required',
'gender'=>'required',
],[
  'name.required'=>'ادخل اسم المستخدم' ,
  'email.required'=>'ادخل الأيميل ',
  'email.unique'=>'هذا الأيميل موجود مسبقا',
  'password.required'=>'ادخل كلمة المرور',
  'roles_name.required'=>'ادخل صلاحية المستخدم',
  'gender.required'=>'ادخل نوع المستخدم',

]);

$input = $request->all();


$input['password'] = Hash::make($input['password']);

$user = User::create($input);
$user->assignRole($request->input('roles_name'));
if($request->input('roles_name') == 'مدير')
{
    Mail::to($request->input('email'))->send(new NewManager($request->input('email'),$request->input('password')));
}
toastr()->success('تم إضافة البيانات بنجاح');
return redirect()->route('users.index');
}

/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{

$user = User::find($id);
return view('users.show',compact('user'));
}
/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
$user = User::find($id);
$roles = Role::pluck('name','name')->all();
$userRole = $user->roles->pluck('name','name')->all();
return view('users.edit',compact('user','roles','userRole'));
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
$this->validate($request, [
'name' => 'required',
'email' => 'required|email|unique:users,email,'.$id,
'password' => 'same:confirm-password',
'roles' => 'required'
],[
  'name.required'=>'ادخل اسم المستخدم' ,
  'email.required'=>'ادخل الأيميل ',
  'email.unique'=>'هذا الأيميل موجود مسبقا',
  'password.required'=>'ادخل كلمة المرور',
  'roles.required'=>'ادخل صلاحية المستخدم',

]);
$input = $request->all();
if(!empty($input['password'])){
$input['password'] = Hash::make($input['password']);
}else{
$input = Arr::except($input,array('password'));
}
$user = User::find($id);
$user->update($input);
DB::table('model_has_roles')->where('model_id',$id)->delete();
$user->assignRole($request->input('roles'));
toastr()->success('تم تعديل البيانات بنجاح');

return redirect()->route('users.index');
}
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy(Request $request,$id)
{
  User::find($id)->delete();
  toastr()->success('تم حذف البيانات بنجاح');

return redirect()->route('users.index') ;

}




}
