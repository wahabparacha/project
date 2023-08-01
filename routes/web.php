<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CrudController;

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

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'Adminlogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'Adminprofile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'Adminprofilestore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'Adminchangepassword'])->name('admin.change.password');
    Route::post('admin/update/password', [AdminController::class, 'Adminupdatepassword'])->name('admin.update.password');
    Route::get('/admin/calender', [AdminController::class, 'Admincalender'])->name('admin.calender');
    Route::get('list',[CrudController::class,'index'])->name('user.list');
});
Route::get('/admin/login', [AdminController::class, 'Adminlogin'])->name('admin.login');

//CRUDS for user
Route::get('add',[CrudController::class,'add'])->name('user.add');
Route::post('save',[CrudController::class,'save'])->name('user.save');
Route::get('edit/{id}',[CrudController::class,'edit'])->name('user.edit');
Route::post('update',[CrudController::class,'update'])->name('user.update');
Route::get('delete/{id}',[CrudController::class,'delete'])->name('user.delete');
