<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MultiPictureController;
use App\Http\Controllers\UserLogoutController;
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



Route::post('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    return view('user_side.index');
})->name('welcomePage');

// Category All Route
Route::get('/category' , [CategoryController::class , 'index'])->name('all_category');
Route::post('/add-category' , [CategoryController::class , 'addCategory'])->name('add_category');
Route::get('/category/delete/{id}' , [CategoryController::class , 'delete'])->name('delete_category');
Route::get('/category/edit/{id}' , [CategoryController::class , 'edit'])->name('edit_category');
Route::post('/category/update/{id}' , [CategoryController::class , 'update'])->name('update_category');

//Brand All Route
Route::get('/all-brand' , [BrandController::class , 'index'])->name('all_brands');
Route::post('/store-brand' , [BrandController::class , 'store'])->name('store_brands');
Route::get('/all-brand/edit/{id}' , [BrandController::class , 'edit'])->name('edit_brands');
Route::put('/all-brand/update/{id}' , [BrandController::class , 'update'])->name('update_brands');
Route::get('/all-brand/delete/{id}' , [BrandController::class , 'delete'])->name('delete_brands');

//Multi image Routes
Route::get('/multi-pictures' ,[MultiPictureController::class , 'index'])->name('multi_pictures');
Route::post('/multi-pictures/store' ,[MultiPictureController::class , 'store'])->name('multi_pictures.store');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
//        $users = User::all();
//        $users = DB::table('users')->select('users.*')->get();
        return view('admin.index');
    })->name('dashboard');
});

//Logout controller
Route::get('/logout' , [UserLogoutController::class , 'logout'])->name('user.logout');
