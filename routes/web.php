<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/About', function () {
    echo"This is about page";
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//category controller//

Route::get('Category/All','CategoryController@AllCat')->name('all.category');
Route::post('Category/Add','CategoryController@AddCat')->name('store.category');
Route::get('Category/Edit/{id}','CategoryController@Edit')->name('edit_category');
Route::post('Category/Update/{id}','CategoryController@update')->name('update_category');
Route::post('Category/Delete/{id}','CategoryController@destroy')->name('destroy_category');





