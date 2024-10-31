<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ColorController;
use Dotenv\Store\FileStore;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ReceptionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkController;

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
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware' => ['auth']], function () {

    // USERS
    Route::get('/users/list', [UserController::class, 'list'])->name('users.list');
    Route::get('/users/permissions/{id?}', [UserController::class, 'getPermissionsForUsers'])->name('users.permissions');
    Route::post('/users/changePermissions/{id?}', [UserController::class, 'changePermissions'])->name('users.changePermissions');
    Route::resource('/users', UserController::class);

    // LOGS
    Route::get('/logs/list', [LogController::class, 'list'])->name('logs.list');
    Route::resource('/logs', LogController::class);

    // FILES
    Route::resource('/files', FileController::class);

    //Statuses

    Route::resource('statuses', StatusController::class);

    //Brands

    Route::resource('brands', BrandController::class);

    //colors

    Route::resource('colors', ColorController::class);

    //Types

    Route::resource('types', TypeController::class);

    //Services

    Route::resource('services', ServiceController::class);

    //Spareparts

    Route::resource('spareparts', SparepartController::class);

    //owners

    Route::resource('owners', OwnerController::class);

    //Cars

    Route::resource('cars', CarController::class);

    //Receptions

    Route::resource('receptions', ReceptionController::class);

    //Works

    Route::resource('works', WorkController::class);

   
});
