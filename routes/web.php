<?php
use Illuminate\Http\Request;
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
    return view('pages.index');
});
Route::get('/form',function(){
    return view('pages.form');
});
Route::get('/prison/{id}',function(){
    return view('pages.prisonerdetails');
});
Route::get('/facetsearch',function(){
    return view('pages.facesearch');
});
Route::post('/form','PrisonerController@store');
Route::get('/prison','PrisonerController@index');
Route::get('/prison/create','PrisonerController@create');
Route::post('facetsearch','PrisonerController@facetsearch');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
