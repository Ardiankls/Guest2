<?php
use App\Http\Controllers\Auth\ActivationController;
use App\Http\Controllers\Creator\EventController;
use App\Http\Controllers\Creator\GuestController as CreatorGuestController;
use App\Http\Controllers\StudentController as UUserController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\User\EventController as EventControllerUser;
use App\Http\Controllers\User\GuestController as GuestControllerAlias;
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
    Route::resource('guests', CreatorGuestController::class);
    Route::post('guests/{id}/approve', [CreatorGuestController::class, 'approve'])->name('guests.approve');
    Route::post('guests/{id}/decline', [CreatorGuestController::class, 'decline'])->name('guests.decline');


});

Route::group(['middleware' => 'user','prefix' => 'user', 'prefix' => 'user', 'as'=> 'user.'], function(){
    Route::resource('user', UUserController::class);
    Route::resource('guests', GuestControllerAlias::class);
    Route::resource('event', EventControllerUser::class);
//    Route::resource('user', GuestControllerAlias::class);

});
//group


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
