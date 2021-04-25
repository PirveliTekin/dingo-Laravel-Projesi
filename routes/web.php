<?php


use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ChefsController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\MenuController;
use App\Http\Controllers\Frontend\SingleblogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RouteController;
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
Route::get('/',[HomeController::class,'index'])->name('index');
/*Route::get('/',[AboutController::class,'index'])->name('index');*/
Route::resource('/about',AboutController::class);
Route::resource('/menu',MenuController::class);
Route::resource('/contact',ContactController::class);
Route::resource('/chefs',ChefsController::class);
Route::resource('/blog',BlogController::class);
Route::resource('/singleblog',SingleblogController::class);
Route::group(['middleware' => 'guest'],function (){
    Route::resource('/install','InstallController');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::prefix('admin')->middleware(['auth','admin'])->name('admin.')->group(function (){
    Route::get('/', [AdminController::class, 'index'])->name('anasayfa');
    Route::get('/routes', [RouteController::class, 'index'])->name('routes');
    Route::resource('/users',UserController::class);
});



