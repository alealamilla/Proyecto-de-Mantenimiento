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
use App\Models\Reception;
use App\Models\Work;

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
    Route::get('/types/preview/{brand}', [TypeController::class, 'preview'])->name('types.preview');
    Route::resource('types', TypeController::class);

    //Services

    Route::resource('services', ServiceController::class);

    //Spareparts

    Route::resource('spareparts', SparepartController::class);

    //owners

    Route::resource('owners', OwnerController::class);

    //Cars
    Route::get('/cars/preview/{owner}', [CarController::class, 'preview'])->name('cars.preview');
    Route::resource('cars', CarController::class);

    //Receptions
    Route::get('/receptions/list', [ReceptionController::class, 'list'])->name('receptions.list');
    Route::get('/receptions/follows', [ReceptionController::class, 'follows'])->name('receptions.follows');
    Route::view('/receptions/next', 'reception.next')->name('receptions.nexts');;
    Route::resource('receptions', ReceptionController::class);

    //Works
    Route::get('/works/recap/{id}', [WorkController::class, 'recap'])->name("works.recap");
    Route::resource('works', WorkController::class);

    //DashBoard
    Route::get('/dashboard', [ReceptionController::class, 'dash'])->name('dashboard');
    Route::get('/dashboard/data', [ReceptionController::class, 'getStatusData'])->name('dashboard.data');
});
