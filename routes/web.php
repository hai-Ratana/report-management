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
Route::get('logout', function (){
Auth::logout();
return redirect('/');
});


Auth::routes();
Route::get('/', function () {
    return redirect('report');
});

Route::get('report','HomeController@newTab')->name('new');
Route::get('report/view','HomeController@viewTab')->name('view');
Route::get('report/admin','HomeController@adminTab')->name('admin');
Route::get('ajax/report','HomeController@ajaxReport');
Route::get('report/date','HomeController@test');
Route::post('report/filter','HomeController@viewFilter')->name('report/filter');
Route::get('report/day','HomeController@filterReport');
Route::get('remove/report','HomeController@removeReport');
Route::get('edit/report/{id}','HomeController@editReport');
Route::post('update/report','HomeController@updateReport')->name('update');
Route::get('print','HomeController@printReport');
Route::get('test','HomeController@test');
Route::post('sendmail','MailController@sendMail');


Route::post('create/user/ajax','HomeController@storeUser');
Route::post('edit/user/ajax','HomeController@editUser');
Route::get('delete/user/ajax','HomeController@removeUser');
Route::post('create/project/ajax','HomeController@storeProjects');
Route::get('project/edit/{id}','HomeController@editProject');
Route::post('edit/project/ajax/{id}','HomeController@changeProject');
Route::get('project/delete/ajax/{id}','HomeController@removeProject');
Route::get('testpage','HomeController@testPage');



Route::post('user','HomeController@createUser');
Route::post('create/report','HomeController@createReport');
