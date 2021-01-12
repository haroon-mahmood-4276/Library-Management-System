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
Route::get('/logout', function () {
    Session()->forget('Data');
    return redirect('/');
});
Route::get('/admin/dashboard', 'AdminController@Dashboard');

Route::view('/user/login', 'user.login');
Route::post('/user/login', 'UserController@Login');

Route::get('/user/books', 'UserController@Books');
Route::get('/user/books/search', 'UserController@SearchBooks');

Route::resource('racks', 'RackController');
Route::resource('books', 'BookController');
