<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DriverController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Admin Routes
require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'Adminlogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'Adminprofile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'Adminprofilestore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'Adminchangepassword'])->name('admin.change.password');
    Route::post('admin/update/password', [AdminController::class, 'Adminupdatepassword'])->name('admin.update.password');
    Route::get('/user/list', [UserController::class, 'index'])->name('user.list');
    Route::get('/driver/list', [DriverController::class, 'index'])->name('driver.list');

});
Route::get('/admin/login', [AdminController::class, 'Adminlogin'])->name('admin.login');

//User
Route::get('/user/add', [UserController::class, 'add'])->name('user.add');
Route::post('/user/save', [UserController::class, 'save'])->name('user.save');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('/user/update', [UserController::class, 'update'])->name('user.update');
Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');


//Driver
Route::group(['middleware' => 'auth'], function () {
    Route::get('/driver/add', [DriverController::class, 'add'])->name('driver.add');
    Route::post('/driver/save', [DriverController::class, 'save'])->name('driver.save');
    Route::get('/driver/edit/{id}', [DriverController::class, 'edit'])->name('driver.edit');
    Route::post('/driver/update', [DriverController::class, 'update'])->name('driver.update');
    Route::get('/driver/delete/{id}', [DriverController::class, 'delete'])->name('driver.delete');
    Route::get('/assign-driver/{user_id}', [DriverController::class, 'assignpage'])->name('driver.assignpage');
    Route::post('/assign/driver/{user_id}', [DriverController::class, 'assignDriver'])->name('driver.assign');
    Route::get('/user/{user_id}/info',  [DriverController::class, 'info'])->name('driver.info');
    Route::get('/user/{user_id}/cancel',  [DriverController::class, 'cancel'])->name('cancel.ride');
});
