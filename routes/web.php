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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/abcd', function () {
    return view('test');
});

Route::get('/file1', function () {
    return view('home.file1');
});

Route::get('/file2', 'FirstTableController@firstView');
Route::get('/insertContents', 'FirstTableController@insertContents');

Route::post('/emp_insert','ThirdController@insertEmployeeDetails');


Route::get('/form1', function () {
    return view('form.form1');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/empView', 'ThirdController@empView');

Route::get('/edit/{id}','ThirdController@edit');

Route::post('/emp_update','ThirdController@update');

Route::get('/emp/view',[
			   'uses' => 'ThirdController@view', 
			   'as' => 'view.emp']);

Route::get('/delete/{id}','ThirdController@delete');


Route::get('/empSearch','ThirdController@search');

Route::get('/contact', function () {
    return view('mail.contact');
});

Route::post('contact_us','MailController@basic_email');


Route::get('/downloadPDF/{id}','ThirdController@downloadPDF');

Route::get('/downloadAllPDF','ThirdController@downloadAllPDF');