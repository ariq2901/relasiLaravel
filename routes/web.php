<?php

use App\Http\Controllers\AriqController;
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

Route::get('/', 'AriqController@index');

Route::post('add-category', 'AriqController@addCategory');

Route::post('add-product', 'AriqController@addProduct');

Route::get('manage-category', 'AriqController@manageCategory');

Route::patch('/update/{product}', 'AriqController@update');

Route::patch('/category/update/{category}', 'AriqController@categoryUpdate');

Route::get('/product/{product}/edit', 'AriqController@edit');

Route::get('/category/{category}/edit', 'AriqController@categoryEdit');

Route::get('/get-products/{id}', 'AriqController@getproductsByCategory');

Route::get('/form-category', 'AriqController@categoryForm');

Route::get('/form-product', 'AriqController@productForm');

Route::delete('/delete/{product}', 'AriqController@destroy');

Route::delete('/category/delete/{category}', 'AriqController@categoryDestroy');
