<?php

use App\Http\Controllers\AdminProblemController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\Branch_ProblemController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DeshdoerdController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\landingController;
use App\Http\Controllers\MangerReportController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostNotificationController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ChatController;
use App\Http\Livewire\Chatt;
use App\Mail\SolveProblem;
use App\Mail\solveProlem;
use App\Models\AdminProblem;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/',[landingController::class,'index'])->name('landing');
Route::post('/problems', [AdminProblemController::class,'store'])->name('problems.store');


Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::get('owner_profile/{id}',[OwnerController::class,'owner_profile'])->name('show_profile');
    Route::put('owner_update',[OwnerController::class,'owner_update'])->name('owner_update');
    Route::get('delete_owner/{id}',[OwnerController::class,'delete_owner'])->name('delete_owner');
    Route::post('owner_feedback',[OwnerController::class,'owner_feedback'])->name('owner_feedback');

    Route::resource('/branches', BranchController::class);
    Route::resource('/regions', RegionController::class);
    Route::resource('/posts', PostController::class);
    Route::get('deshoerd',[DeshdoerdController::class,'index'])->name('deshoerd');
    Route::get('display_owners',[DeshdoerdController::class,'display_owners'])->name('display_owners');
    Route::resource('/branch_problem', Branch_ProblemController::class);
    Route::get('/asRead/{id}', [Branch_ProblemController::class,'asRead'])->name('asRead');

    Route::resource('/AdminProblems', AdminProblemController::class);

    Route::get('post/{id}',[PostController::class,'getRegion']);
    Route::resource('feedback',FeedbackController::class);
    Route::resource('admin_reports',AdminReportController::class);
    Route::resource('manger_reports',MangerReportController::class);
    Route::resource('notify',PostNotificationController::class);
    Route::get('filter_by_region',[PostController::class,'filter_by_region'])->name('filter_by_region');
    Route::get('filter_by_Type',[PostController::class,'filter_by_Type'])->name('filter_by_Type');
   //new
   Route::post('send_mail',[AdminProblemController::class,'send_to_mail'])->name('send_to_mail');
Route::resource('chat',ChatController::class);

});

Route::get('search', function(){
    return view('search');
});






