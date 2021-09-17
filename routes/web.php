<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('index');
})->name('/');

Route::get('crud', function () {
    return view('crud');
});

//User
Route::get("/user", "UserController@index")->name('user');
Route::get("/user/create", "UserController@create")->name('user.create');
Route::post("/user/store", "UserController@store")->name('user.store');
Route::get("/user/edit/{id}", "UserController@edit")->name('user.edit');
Route::put('/user/update/{id}', 'UserController@update')->name('user.update');
Route::get("/user/destroy/{id}", "UserController@destroy")->name('user.destroy');



//Role
Route::get("/role", "RoleController@index")->name('role');
Route::get("/role/create", "RoleController@create")->name('role.create');
Route::post("/role/store", "RoleController@store")->name('role.store');
Route::get('/role/edit/{id}', 'RoleController@edit')->name('role.edit');
Route::put('/role/update/{id}', 'RoleController@update')->name('role.update');
Route::get('/role/destroy/{id}', 'RoleController@destroy')->name('role.destroy');
Route::get('/role/search','RoleController@ajaxSearch')->name('role.ajaxsearch');



//Category
Route::get("/category", "CategoryController@index")->name('category');
Route::get("/category/create", "CategoryController@create")->name('category.create');
Route::post("/category/store", "CategoryController@store")->name('category.store');
Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
Route::put('/category/update/{id}', 'CategoryController@update')->name('category.update');
Route::get('/category/destroy/{id}', 'CategoryController@destroy')->name('category.destroy');

