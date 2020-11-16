<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



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
Route::get('/home','PagesController@index');
Route::get('/','PagesController@index');

Route::get('/calendar/{month}/{year}','CalendarController@calendar');
Route::post('/calendar/{month?}/{year?}','CalendarController@store');
Route::post('/makeContact','ChatController@makeContact');

Route::get('/SignUp','PagesController@SignUp');

Auth::routes();
Route::resource('adverts','AdvertsController');
//Route::resource('messages','MessagesController');
//Route::get('messages/create/{id}', 'MessagesController@create');
//Route::get('messages/create/{id}', 'MessagesController@create');
//Route::get('messages/create/{id}', 'MessagesController@create');

Route::get('/chat','ChatController@index');
//Route::get('/mailbox/show/{id}','MailboxController@showSpecificMail');
Route::get('/userpanel','UserController@index');
Route::post('/userpanel','UserController@update_avatar');
Route::post('/profile/istutorupdate','UserController@isTutorUpdate');
Route::post('/profile/birthdateupdate','UserController@birthDateUpdate');

//Route::post('/userpanel',function(Request $request){
 //$path=$request->file('avatar')->store('avatars');
 //return $path;
 //return "uploaded";
//});
Route::get('/test','TestController@index');


Route::get('/message/{id}','ChatController@getMessage');
Route::post('/sendmessage','ChatController@sendMessage');



