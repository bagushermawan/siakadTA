<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ForgotPasswordController;

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

Route::get('/a', function () {
    return view('index');
})->name('a');

Route::get('crud', function () {
    return view('crud');
});

//Login
Route::get('/login', 'LoginController@login')->name('login');
Route::post('/actionlogin', 'LoginController@actionlogin')->name('actionlogin');
Route::get('/logout', 'LoginController@logout')->name('logout')->middleware('auth');
Route::get('/home', 'WelcomeController@index')->name('home')->middleware(['auth', 'role']);

// Rute untuk menampilkan form lupa password
Route::get('forgot-password', 'ForgotPasswordController@showLinkRequestForm')->name('forgot.password');
// Rute untuk mengirim email tautan reset password
Route::post('forgot-password', 'ForgotPasswordController@sendResetLinkEmail')->name('forgot.password.email');
// Rute untuk menampilkan form reset password
Route::get('forgot-password/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
// Rute untuk mengatur password baru
Route::post('reset-password', 'ResetPasswordController@reset')->name('password.update');


Route::middleware(['auth', 'role'])->group(function () {
    //User
    Route::get('/user', 'UserController@index')->name('user');
    Route::get('/user/create', 'UserController@create')->name('user.create');
    Route::post('/user/store', 'UserController@store')->name('user.store');
    Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::put('/user/update/{id}', 'UserController@update')->name('user.update');
    Route::get('/user/destroy/{id}', 'UserController@destroy')->name('user.destroy');
    //Role
    Route::get('/role', 'RoleController@index')->name('role');
    Route::get('/role/create', 'RoleController@create')->name('role.create');
    Route::post('/role/store', 'RoleController@store')->name('role.store');
    Route::get('/role/edit/{id}', 'RoleController@edit')->name('role.edit');
    Route::put('/role/update/{id}', 'RoleController@update')->name('role.update');
    Route::get('/role/destroy/{id}', 'RoleController@destroy')->name('role.destroy');
    Route::get('/role/search', 'RoleController@ajaxSearch')->name('role.ajaxsearch');
    //Category
    Route::get('/category', 'CategoryController@index')->name('category');
    Route::get('/category/create', 'CategoryController@create')->name('category.create');
    Route::post('/category/store', 'CategoryController@store')->name('category.store');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::put('/category/update/{id}', 'CategoryController@update')->name('category.update');
    Route::get('/category/destroy/{id}', 'CategoryController@destroy')->name('category.destroy');
    Route::get('/category/search', 'CategoryController@ajaxSearch')->name('category.ajaxsearch');
    //Product
    Route::get('/product', 'ProductController@index')->name('product');
    Route::get('/product/create', 'ProductController@create')->name('product.create');
    Route::post('/product/store', 'ProductController@store')->name('product.store');
    Route::get('/product/edit/{id}', 'ProductController@edit')->name('product.edit');
    Route::put('/product/update/{id}', 'ProductController@update')->name('product.update');
    Route::get('/product/destroy/{id}', 'ProductController@destroy')->name('product.destroy');
    //Role
    Route::get('/complaint', 'ComplaintController@index')->name('complaint');
    Route::get('/complaint/create', 'ComplaintController@create')->name('complaint.create');
    Route::post('/complaint/store', 'ComplaintController@store')->name('complaint.store');
    Route::get('/complaint/edit/{id}', 'ComplaintController@edit')->name('complaint.edit');
    Route::put('/complaint/update/{id}', 'ComplaintController@update')->name('complaint.update');
    Route::get('/complaint/destroy/{id}', 'ComplaintController@destroy')->name('complaint.destroy');
    Route::get('/complaint/search', 'ComplaintController@ajaxSearch')->name('complaint.ajaxsearch');
    //Transaction
    Route::get('/transaction', 'TransactionController@index')->name('transaction');
    Route::get('/transaction/create', 'TransactionController@create')->name('transaction.create');
    Route::post('/transaction/store', 'TransactionController@store')->name('transaction.store');
    Route::get('/transaction/edit/{id}', 'TransactionController@edit')->name('transaction.edit');
    Route::put('/transaction/update/{id}', 'TransactionController@update')->name('transaction.update');
    Route::get('/transaction/destroy/{id}', 'TransactionController@destroy')->name('transaction.destroy');
    Route::get('/transaction/search', 'TransactionController@ajaxSearch')->name('transaction.ajaxsearch');
    //Blog
    Route::get('/blog', 'BlogController@index')->name('blog');
    Route::get('/blog/create', 'BlogController@create')->name('blog.create');
    Route::post('/blog/store', 'BlogController@store')->name('blog.store');
    Route::get('/blog/edit/{id}', 'BlogController@edit')->name('blog.edit');
    Route::put('/blog/update/{id}', 'BlogController@update')->name('blog.update');
    Route::get('/blog/destroy/{id}', 'BlogController@destroy')->name('blog.destroy');
    Route::get('/blog/search', 'BlogController@ajaxSearch')->name('blog.ajaxsearch');
    //Ask
    Route::get('/ask', 'AskController@index')->name('ask');
    Route::get('/ask/create', 'AskController@create')->name('ask.create');
    Route::post('/ask/store', 'AskController@store')->name('ask.store');
    Route::get('/ask/edit/{id}', 'AskController@edit')->name('ask.edit');
    Route::put('/ask/update/{id}', 'AskController@update')->name('ask.update');
    Route::get('/ask/destroy/{id}', 'AskController@destroy')->name('ask.destroy');
    Route::get('/ask/search', 'AskController@ajaxSearch')->name('ask.ajaxsearch');
});

//Front
Route::get('/', 'FrontController@index')->name('/');
Route::get('/resi', 'FrontController@resi')->name('resi');
Route::get('/getTransaction', 'FrontController@getTransaction')->name('/getTransaction');
Route::post('/getTransactionbyid', 'FrontController@getTransactionbyKode')->name('/getTransactionbyid');

//Tes
// Route::get("/", "TesController@index")->name('/');
