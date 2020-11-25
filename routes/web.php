<?php
use App\Http\Controllers\Auth\ActivationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\StudentController as UUserController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('event.index');
});
Route::get('activate' , [ActivationController::class, 'activate'])->name('activate');


Route::resource('event', EventController::class);

//group
//route group berfungsi untuk memberi izin role apa yang bisa masuk ke page tertentu
Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as'=> 'admin.'], function(){
   Route::resource('user', UserController::class);
    Route::resource('event', AdminEventController::class);
});

Route::group(['middleware' => 'creator', 'prefix' => 'creator', 'as'=> 'creator.'], function(){

    Route::resource('event', EventController::class);
});

Route::group(['middleware' => 'user','prefix' => 'user', 'prefix' => 'user', 'as'=> 'user.'], function(){

    Route::resource('user', UUserController::class);
    Route::resource('user', \App\Http\Controllers\User\GuestController::class);

});
//group


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
