<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\welcome;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $msg='هذا الحقل مطلوب';

        return Validator::make($data, [
            'name1' => ['required', 'string', 'max:255'],
            'name2' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'roles_name' => ['required'],
            'gender' => ['required'],

        ],
        [
            'name1.required'=> $msg,
            'name2.required'=> $msg,
            'email.required'=> $msg,
            'email.unique'=>'هذا الأيميل موجود مسبقا من فضلك ادخل ايميل اخر',
            'password.required'=> $msg,
            'password.confirmed'=>'تأكيد  كلمة المرور غير متطابق',
            'roles_name.required'=> $msg,
            'gender.required'=> $msg,



        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $name=$data['name1'] .' '. $data['name2'];

        // return User::create([
        //     'name' => $name,
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        //     'gender'=>$data['gender'],
        //     'roles_name'=>$data['roles_name'],

        // ]);
        $user=User::create([
                'name' => $name,
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'gender'=>$data['gender'],
                'roles_name'=>$data['roles_name'],
                'image_path'=>'d/avtar_5.png'

            ]);
            // Mail::to($data['email'])->send(new welcome($data['roles_name']));
            toastr()->success('تم أنشاء الحساب  بنجاح');
           return $user->assignRole($data['roles_name']);


    }

}
