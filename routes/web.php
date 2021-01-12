<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/admin/login', 'admin.login');
Route::post('/admin/login', 'AdminController@Login');
Route::get('/admin/logout', function () {
    Session()->forget('Data');
    return redirect('/');
});
 Route::get('/admin/dashboard', 'AdminController@Dashboard');
// Route::get('/admin/racks', [AdminController::class, 'RacksList']);
// Route::delete('/admin/racks/delete/{id}', [AdminController::class, 'DeleteRacks']);

// Route::get('/admin/books', [AdminController::class, 'BooksList']);
// Route::delete('/admin/books/delete/{id}', [AdminController::class, 'DeleteBooks']);
// Route::post('/admin/books/add', [AdminController::class, 'AddBook']);


// Route::view('/user/login', 'User.Login');
// Route::post('/user/login', [UserController::class, 'Login']);
// Route::get('/user/logout', function () {
//     Session()->forget('Data');
//     return redirect('/');
// });
// Route::get('/user/books', [UserController::class, 'Books']);
// Route::get('/user/books/search', [UserController::class, 'SearchBooks']);

Route::resource('racks', 'RackController');
