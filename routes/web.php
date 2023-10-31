<?php

use App\Exports\PrestasisExport;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ForgotPasswordController;
use Maatwebsite\Excel\Facades\Excel;

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
    //Mapel
    Route::get('/mapel', 'MapelController@index')->name('mapel');
    Route::get('/mapel/create', 'MapelController@create')->name('mapel.create');
    Route::post('/mapel/store', 'MapelController@store')->name('mapel.store');
    Route::get('/mapel/edit/{id}', 'MapelController@edit')->name('mapel.edit');
    Route::put('/mapel/update/{id}', 'MapelController@update')->name('mapel.update');
    Route::get('/mapel/destroy/{id}', 'MapelController@destroy')->name('mapel.destroy');
    Route::get('/mapel/search', 'MapelController@ajaxSearch')->name('mapel.ajaxsearch');
    //Ekskul
    Route::get('/ekskul', 'EkskulController@index')->name('ekskul');
    Route::get('/ekskul/create', 'EkskulController@create')->name('ekskul.create');
    Route::post('/ekskul/store', 'EkskulController@store')->name('ekskul.store');
    Route::get('/ekskul/edit/{id}', 'EkskulController@edit')->name('ekskul.edit');
    Route::put('/ekskul/update/{id}', 'EkskulController@update')->name('ekskul.update');
    Route::get('/ekskul/destroy/{id}', 'EkskulController@destroy')->name('ekskul.destroy');
    //Role
    Route::get('/tahunajaran', 'TahunAjaranController@index')->name('tahunajaran');
    Route::get('/tahunajaran/create', 'TahunAjaranController@create')->name('tahunajaran.create');
    Route::post('/tahunajaran/store', 'TahunAjaranController@store')->name('tahunajaran.store');
    Route::get('/tahunajaran/edit/{id}', 'TahunAjaranController@edit')->name('tahunajaran.edit');
    Route::put('/tahunajaran/update/{id}', 'TahunAjaranController@update')->name('tahunajaran.update');
    Route::get('/tahunajaran/destroy/{id}', 'TahunAjaranController@destroy')->name('tahunajaran.destroy');
    Route::get('/tahunajaran/search', 'TahunAjaranController@ajaxSearch')->name('tahunajaran.ajaxsearch');
    //Kelas
    Route::get('/kelas', 'KelasController@index')->name('kelas');
    Route::get('/kelas/create', 'KelasController@create')->name('kelas.create');
    Route::post('/kelas/store', 'KelasController@store')->name('kelas.store');
    Route::get('/kelas/edit/{id}', 'KelasController@edit')->name('kelas.edit');
    Route::put('/kelas/update/{id}', 'KelasController@update')->name('kelas.update');
    Route::get('/kelas/destroy/{id}', 'KelasController@destroy')->name('kelas.destroy');
    Route::get('/kelas/search', 'KelasController@ajaxSearch')->name('kelas.ajaxsearch');
    //Prestasi
    Route::get('/prestasi', 'PrestasiController@index')->name('prestasi');
    Route::get('/prestasi/create', 'PrestasiController@create')->name('prestasi.create');
    Route::post('/prestasi/store', 'PrestasiController@store')->name('prestasi.store');
    Route::get('/prestasi/edit/{id}', 'PrestasiController@edit')->name('prestasi.edit');
    Route::put('/prestasi/update/{id}', 'PrestasiController@update')->name('prestasi.update');
    Route::get('/prestasi/destroy/{id}', 'PrestasiController@destroy')->name('prestasi.destroy');
    Route::get('/prestasi/search', 'PrestasiController@ajaxSearch')->name('prestasi.ajaxsearch');
    Route::get('export-csv', function () {
        return Excel::download(new PrestasisExport, 'tes ekspor prestasi.csv');
    });
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
Route::get('/getKelas', 'FrontController@getKelas')->name('/getKelas');
Route::post('/getKelasbyid', 'FrontController@getKelasbyKode')->name('/getKelasbyid');

//Tes
// Route::get("/", "TesController@index")->name('/');
