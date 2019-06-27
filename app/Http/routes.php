<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@accueil')->name('accueil');

Route::get('/solde', 'HomeController@solde')->name('solde');
Route::get('/homme', 'HomeController@homme')->name('homme');
Route::get('/femme', 'HomeController@femme')->name('femme');

Route::get('/ficheProduct/{id}','HomeController@ficheProduct'); 

Route::auth();

Route::get('/admin', 'HomeController@index');
Route::get('/categorie', 'HomeController@categorie')->name('categorie');
Route::get('/createProduct', 'HomeController@createProduct')->name('createProduct');

Route::get('/createCategorie', 'HomeController@createCategorie')->name('createCategorie');

Route::post('/validateProduct', 'HomeController@validateProduct')->name('validateProduct');

Route::post('/validateCategorie', 'HomeController@validateCategorie')->name('validateCategorie');

Route::get('/updateCategorie/{id}', 'HomeController@updateCategorie')->name('updateCategorie');

Route::post('/editcategorie/{id}','HomeController@editcategorie')->name('editCategorie');

Route::get('/deleteCategorie/{id}', 'HomeController@deleteCategorie')->name('deleteCategorie');

Route::get('/updateProductView/{id}','HomeController@updateProductView')->name('updateProductView');

Route::get('/updateProduct/{id}','HomeController@updateProduct')->name('updateProduct');

Route::post('/editProduct/{id}','HomeController@editProduct')->name('editProduct');

Route::get('/DeleteProduct/{id}','HomeController@DeleteProduct');