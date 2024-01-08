<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DeshdoerdController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:لوحة التحكم', ['only' => ['index']]);
         $this->middleware('permission:اصحاب السكن', ['only' => ['display_owners']]);

    }
    public function index(){
      
      $chartjs1 = app()->chartjs
      ->name('pieChartTest')
      ->type('pie')
      ->size(['width' => 400, 'height' => 200])
      ->labels(['Label x', 'Label y'])
      ->datasets([
          [
              'backgroundColor' => ['#FF6384', '#36A2EB'],
              'hoverBackgroundColor' => ['#FF6384', '#36A2EB'],
              'data' => [69, 59]
          ]
      ])
      ->options([]);

      $chartjs2= app()->chartjs
   ->name('barChartTest')
   ->type('bar')
   ->size(['width' => 400, 'height' => 200])
   ->labels(['Label x', 'Label y'])
   ->datasets([
       [
           "label" => "My First dataset",
           'backgroundColor' => ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'],
           'data' => [69, 59]
       ],
       [
           "label" => "My First dataset",
           'backgroundColor' => ['rgba(255, 99, 132, 0.3)', 'rgba(54, 162, 235, 0.3)'],
           'data' => [65, 12]
       ]
   ])
   ->options([]);
      return view('deshoerd',compact('chartjs1','chartjs2'));
    }
    public function display_owners(){
      $owners=User::where('roles_name','صاحب السكن')->get();
      return view('owners',compact('owners'));
    }
    
}
