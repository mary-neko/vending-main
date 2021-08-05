<?php

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

Route::get('/', 'loginController@login')->name('login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// 商品一覧を表示
Route::get('/productlist', 'productListController@list')->name('list');

//検索結果を表示
Route::get('/productlist/search', 'SearchController@getSearch')->name('getSearch');

//商品登録画面を表示
Route::get('/product/create', 'productController@showCreate')->name('create');

//商品を登録
Route::post('/product/store', 'productController@exeStore')->name('store');

// 詳細画面を表示
Route::get('/productlist/{id}', 'productListController@detail')->name('detail');

// 編集画面を表示
Route::get('/productlist/edit/{id}', 'productController@showEdit')->name('edit');

// 編集内容を登録
Route::post('/product/update', 'productController@exeUpdate')->name('update');

//商品を削除
Route::post('/productlist/delete/{id}', 'productlistController@exeDelete')->name('delete');
