<?php

Route::get('/','HomeController@home');
Route::get('bought/store/{itemId}', 'StoreController@index');
Route::get('addItem','AddItemController@AddItem');
Route::post('added','AddItemController@insertItem');
Route::get('boughtList','BoughtListController@DisplayList');
Route::get('bought/{itemId}','BoughtItemController@show');
Route::post('bought/{itemId}','BoughtItemController@GetId');
Route::get('edit/{itemId}', 'EditController@getId');
Route::post('edit/{itemId}','EditController@edit');
Route::get('delete/{itemId}','EditController@delete');
Route::post('bought/store/{itemId}','StoreController@insertStore');