<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use App\Models\User;
// use Auth;

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
    return view('welcome');
});

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});


Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    // return view('dashboard');  this is the default jetstream dashboard
    return view('admin.index');
})->name('dashboard');

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    // $id = Auth::user()->id;
    $user = User::find(Auth::user()->id);
    return view('dashboard', compact('user'));
})->name('dashboard');

// ADMIN ROUTES
Route::get('admin/logout',[AdminController::class, 'destroy'])->name('admin.logout'); // use the destroy method from App\Http\Controllers\AdminController;

Route::get('admin/profile',[AdminProfileController::class, 'viewAdminProfile'])->name('admin.profile'); 
Route::get('admin/edit_profile',[AdminProfileController::class, 'editAdminProfile'])->name('admin.edit_profile'); 
Route::post('admin/edit_profile_store_update',[AdminProfileController::class, 'storeAdminProfileUpdate'])->name('admin.profile.store_update');
Route::get('admin/change_password',[AdminProfileController::class, 'adminChangePassword'])->name('admin.change_password'); 
Route::post('admin/store_password_update',[AdminProfileController::class, 'adminUpdatePassword'])->name('admin.store_password_update');

// User Frontend Routes
Route::get('/',[IndexController::class, 'index']); // use the destroy method from App\Http\Controllers\AdminController;
Route::get('/user/logout',[IndexController::class, 'userLogout'])->name('user.logout');
Route::get('/user/profile',[IndexController::class, 'userProfile'])->name('user.profile');
Route::post('user/profile_store_update',[IndexController::class, 'storeUserProfileUpdate'])->name('user.profile.store.update');
Route::get('/user/change_password',[IndexController::class, 'userChangePassword'])->name('user.change.password');
Route::post('user/store_password_update',[IndexController::class, 'userUpdatePassword'])->name('user.store_password_update');








