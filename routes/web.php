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

/*Route::get('/', function () {
    return view('welcome');
});*/
//
//Route::get('store',function (){
//   return view('pages.store');
//});
//Route::get('edit',function (){
//    return view('pages.edit');
//});
Route::get('/','HomeController@home');
Route::get('bought/store/{itemId}', 'StoreController@index');
Route::get('addItem','AddItemController@AddItem');
Route::post('added','AddItemController@insertItem');
//Route::post('storeAdded','StoreController@insertStore');
Route::get('boughtList','BoughtListController@DisplayList');
//Route::get('bought', 'BoughtItemController@BoughtItem');
Route::get('bought/{itemId}','BoughtItemController@show');
Route::post('bought/{itemId}','BoughtItemController@GetId');
Route::get('edit/{itemId}', 'EditController@getId');
Route::post('edit/{itemId}','EditController@edit');
Route::get('delete/{itemId}','EditController@delete');
Route::post('bought/store/{itemId}','StoreController@insertStore');