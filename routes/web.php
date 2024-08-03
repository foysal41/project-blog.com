<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;

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


Route::get('logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'adminuser'], function () {
    Route::get('panel/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('panel/user/list', [UserController::class, 'user']);
    Route::get('panel/user/add', [UserController::class, 'add_user']);
    Route::post('panel/user/add', [UserController::class, 'insert_user']);
    Route::get('panel/user/edit/{id}', [UserController::class, 'edit_user']);
    Route::post('panel/user/edit/{id}', [UserController::class, 'update_user']);
    Route::get('panel/user/delete/{id}', [UserController::class, 'delete_user']);

    Route::get('panel/category/list', [CategoryController::class, 'category']);
    Route::get('panel/category/add', [CategoryController::class, 'add_category']);
    Route::post('panel/category/add', [CategoryController::class, 'insert_category']);
    Route::get('panel/category/edit/{id}', [CategoryController::class, 'edit_category']);
    Route::post('panel/category/edit/{id}', [CategoryController::class, 'update_category']);
    Route::get('panel/category/delete/{id}', [CategoryController::class, 'delete_category']);

    Route::get('panel/blog/list', [BlogController::class, 'blog']);
    Route::get('panel/blog/add', [BlogController::class, 'add_blog']);
    Route::post('panel/blog/add', [BlogController::class, 'insert_blog']);
    
});