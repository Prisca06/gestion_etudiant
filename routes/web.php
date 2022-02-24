<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/ajout', function () {
    return view('ajout');
});
Route::get('/liste','EtudiantController@index')->name('racine');
Route::get('/delete/{id_etudiant}','EtudiantController@destroy')->name('delete.etudiant');
Route::get('/ajout/etudiant','EtudiantController@create')->name('ajout.etudiant');
Route::get('/modifier/etudiant/{id}','EtudiantController@modifier')->name('modifier.etudiant');
Route::get('/update/{id}','EtudiantController@update')->name('update.etudiant');
Route::get('/afficher/etudiant/{id}','EtudiantController@show')->name('afficher.etudiant');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
