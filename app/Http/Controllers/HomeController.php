<?php

namespace App\Http\Controllers;

use App\Models\appartment;
use App\Models\branch;
use App\Models\picture;
use App\Models\post;
use App\Models\region;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:لوحة التحكم', ['only' => ['index']]);

    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        if(Auth::user()->roles_name=='مستخدم'|| Auth::user()->roles_name=='صاحب السكن'){
            $branches = branch::all();
            $regions=region::all();
            $posts = Post::whereHas('Appartment', function (EloquentBuilder $query) {
                $query->where('room_num', '>', 0);
            })
            ->orderBy('updated_at', 'desc')
            ->get();
            $pictures=picture::orderBy('created_at', 'desc')->get();

            return view('index',compact('branches','regions','posts','pictures'));
        }
        elseif(Auth::user()->roles_name=='ادمن'|| Auth::user()->roles_name=='مدير'){

            $all_not_live=appartment::where('status','لم تسكن')->count();//عدد الغرف كلها التى لم تسكن
             $not_live1=appartment::where('branch_id',1)->where('status','لم تسكن' )->count();
             $not_live2=appartment::where('branch_id',2)->where('status','لم تسكن')->count();
             $not_live3=appartment::where('branch_id',3)->where('status','لم تسكن')->count();

             $all_live=appartment::where('status','تم التسكين')->count();//عدد الغرف كلها التى تم تسكينها
             $live1=appartment::where('branch_id',1)->where('status','تم التسكين')->count();
             $live2=appartment::where('branch_id',2)->where('status','تم التسكين')->count();
             $live3=appartment::where('branch_id',3)->where('status','تم التسكين')->count();
             $a1=$a2=$a3=0;
             $x1=$x2=$x3=0;

            if($not_live1){
             $a1=$not_live1 / ($all_not_live * 100);
            }
            if($not_live2){
                $a2=$not_live2 / ($all_not_live*100);
            }
            if($not_live3){
             $a3=$not_live3 / ($all_not_live * 100);
            }

            if($live1){
                $x1=$live1 / ($all_live * 100);
               }
               if($live2){
                   $x2=$live2 / ($all_live*100);
               }
               if($live3){
                $x3=$live3 / ($all_live * 100);
               }
            $chartjs2= app()->chartjs
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 350, 'height' => 150])
            ->labels(['فرع جامعة اسيوط', 'فرع جامعة اسيوط القديمة','فرع جامعة اسيوط الجديدة'])
           
            ->datasets([
               [
                   "label" => "نسبة الغرف",
                   'backgroundColor' => ['#009688', '#ff5722','#8bc34a'],
                   'data' => [$a1,  $a2,$a3]
               ],
              
           ])
            ->options([]);

            $chartjs1 = app()->chartjs
            ->name('pieChartTest')
            ->type('pie')
            ->size(['width' => 200, 'height' => 200])
            ->labels(['فرع جامعة اسيوط', 'فرع جامعة اسيوط القديمة','فرع جامعة اسيوط الجديدة'])
            ->datasets([
                [
                    'backgroundColor' => ['#FF6384', '#36A2EB','#ffc107'],
                    'hoverBackgroundColor' => ['#FF6384', '#36A2EB','#36A2EB'],
                    'data' => [$x1,  $x2, $x3]
                ]
            ])
            ->options([]);

          
        return view('deshoerd',compact('chartjs1','chartjs2'));
        }
        else{
            return view('errors.error404');
        }
    
    }
}
