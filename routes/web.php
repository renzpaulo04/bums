<?php


use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Admin\AdminProject;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\User\Dashboard;
use App\Http\Livewire\Admin\Budget;
use App\Http\Livewire\User\Project;
use App\Http\Livewire\User\ApprovedProject;
use App\Http\Livewire\User\MasterList;
use App\Http\Livewire\User\ProgramWork;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('auth/login');
});
Route::middleware(['middleware'=>'PreventBackHistory'])->group(function(){
    Auth::routes();
});

Route::get('/home', [App\Http\Controllers\MainController::class, 'index'])->name('home');


Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']],function(){
    Route::get('Dashboard', AdminDashboard::class)->name('admin.dashboard');
    Route::get('Project', AdminProject::class)->name('admin.project');
    Route::get('Budget', Budget::class)->name('admin.budget');
});
Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']],function(){
    Route::get('Dashboard', Dashboard::class)->name('user.dashboard');
    Route::get('ProgramWork', ProgramWork::class)->name('user.programWork');
    Route::get('MasterList', MasterList::class)->name('user.masterList');
    Route::get('Project', Project::class)->name('user.project');
    Route::get('ApprovedProject', ApprovedProject::class)->name('user.approvedproject');


});
