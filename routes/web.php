<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('user-dashboard');
// });
Route::get('/', [AdminController::class, 'userDashboard']);
Route::get('/admin-dashboard', [AdminController::class, 'dashboard']);
Route::post('/add-form', [AdminController::class, 'addForm']);
Route::post('/show-forms', [AdminController::class, 'commonFormElementList']);
Route::post('/check-log-in', [AdminController::class, 'checkLogIn']);
Route::post('/common-form-submit', [AdminController::class, 'commonFormSubmit']);
Route::post('/delete-form', [AdminController::class, 'deleteForm']);
Route::post('/edit-form', [AdminController::class, 'editForm']);
Route::get('/load-add-product-form', function () {
    return view('add-product-form');
});

Route::get('/login', function () {
    return view('login');
});
