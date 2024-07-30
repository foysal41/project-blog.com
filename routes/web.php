<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [HomeController::class, 'home']);
Route::get('/login', [AuthController::class, 'login']);
//#8 = 2nd create post route
Route::post('/login', [AuthController::class, 'auth_login']);

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'create_user']);
Route::get('verify/{token}', [AuthController::class, 'verify']);


Route::get('/forgot-password', [AuthController::class, 'forgotPassword']);
//#9 = 2nd create post route
Route::post('/forgot-password', [AuthController::class, 'forgot_password']);

//#9 = 5th
// Route::get('reset/{token}', [AuthController::class, 'reset']);
// Route::post('reset/{token}', [AuthController::class, 'post_reset']);

Route::get('panel/dashboard', [DashboardController::class, 'dashboard']);

