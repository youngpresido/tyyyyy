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
    


Route::get('/adt', function () {
    $prisoners=\App\Prisoner::all();
    return view('pages.index',compact('prisoners'));
})->name('admin');
Route::get('/form',function(){
    return view('pages.form');
})->name('newrecord');
Route::get('/adt/signout',function(){
    $id=Auth::user()->id;
    Auth::logout($id);
    return redirect('/');
})->name('adt.signout');
Route::get('/prison/{id}',function($id){
    $prisoner=\App\Prisoner::whereId($id)->first();
    return view('pages.prisonerdetails',compact('prisoner'));
})->name('ki');
// Route::get('/prison/{id}/delete',function($id){
//     $prisoner=\App\Prisoner::whereId($id)->first();
//     $prisoner->delete();
//     return redirect()->back();
//     // return view('pages.prisonerdetails',compact('prisoner'));
// })->name('p.delete');
// Route::get('/prison/{id}/edit',function($id){
//     $prisoner=\App\Prisoner::whereId($id)->first();
//     $prisoner->delete();
//     // return redirect()->back();
//     return view('pages.prisoneredit',compact('prisoner'));
// })->name('p.edit');
Route::post('/prison/{id}/edit','PrisonerController@edit');
Route::get('/facetsearch',function(){
    return view('pages.facesearch');
});
Route::post('/form','PrisonerController@store');
Route::get('/prison','PrisonerController@index')->name('allprisoner');
// Route::get('prison', 'PrisonersController', [
//     'anyData'  => 'datatables.data',
//     'getIndex' => 'datatables',
// ])->name('allprisoner');


Route::get('/prison/create','PrisonerController@create');
Route::post('facetsearch','PrisonerController@facetsearch');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
