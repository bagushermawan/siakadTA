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
Route::get('/category/search','CategoryController@ajaxSearch')->name('category.ajaxsearch');


//Product
Route::get("/product", "ProductController@index")->name('product');
Route::get("/product/create", "ProductController@create")->name('product.create');
Route::post("/product/store", "ProductController@store")->name('product.store');
Route::get('/product/edit/{id}', 'ProductController@edit')->name('product.edit');
Route::put('/product/update/{id}', 'ProductController@update')->name('product.update');
Route::get('/product/destroy/{id}', 'ProductController@destroy')->name('product.destroy');


//Role
Route::get("/complaint", "ComplaintController@index")->name('complaint');
Route::get("/complaint/create", "ComplaintController@create")->name('complaint.create');
Route::post("/complaint/store", "ComplaintController@store")->name('complaint.store');
Route::get('/complaint/edit/{id}', 'ComplaintController@edit')->name('complaint.edit');
Route::put('/complaint/update/{id}', 'ComplaintController@update')->name('complaint.update');
Route::get('/complaint/destroy/{id}', 'ComplaintController@destroy')->name('complaint.destroy');
Route::get('/complaint/search','ComplaintController@ajaxSearch')->name('complaint.ajaxsearch');

//Transaction
Route::get("/transaction", "TransactionController@index")->name('transaction');
Route::get("/transaction/create", "TransactionController@create")->name('transaction.create');
Route::post("/transaction/store", "TransactionController@store")->name('transaction.store');
Route::get('/transaction/edit/{id}', 'TransactionController@edit')->name('transaction.edit');
Route::put('/transaction/update/{id}', 'TransactionController@update')->name('transaction.update');
Route::get('/transaction/destroy/{id}', 'TransactionController@destroy')->name('transaction.destroy');
Route::get('/transaction/search','TransactionController@ajaxSearch')->name('transaction.ajaxsearch');