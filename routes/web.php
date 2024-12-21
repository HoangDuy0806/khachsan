<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\NhanVienController;
use Illuminate\Support\Facades\Route;

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
// Route::get('/', function () {
//     return view('admin.index');
// });
Route::get('/',[AdminDashboardController::class,'index']);
// Route::get('/', function () {
//     return view('welcome');
// });
Route::name('admin.')->prefix('admin')->group(function(){
    Route::name('other.')->group(function(){
        Route::get('/dashboard',[AdminDashboardController::class,'index'])->name('indexAdmin');
    });
    Route::name('nhanvienManage.')->prefix('nhanvien')->group(function () {
        Route::get('/allnhanvien',[NhanVienController::class,'getAll'])->name('getAllNhanVien');
        Route::get('/data-nhanvien',[NhanVienController::class,'getAllNhanVien'])->name('getDataNhanVien');
    });
});
