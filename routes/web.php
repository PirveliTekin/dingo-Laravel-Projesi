<?php


use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RouteController;
use \App\Http\Controllers;
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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/',[HomeController::class,'index']);
Route::group(['middleware' => 'guest'],function (){
    Route::resource('/install','InstallController');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::namespace('Admin')->prefix('admin')->middleware(['auth'])->name('admin.')->group(function (){
    Route::get('/anasayfa', [AdminController::class, 'index'])->name('anasayfa');
    Route::get('/routes', [RouteController::class, 'index'])->name('routes');
});



