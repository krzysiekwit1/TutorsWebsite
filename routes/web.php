<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\EmailVerificationRequest;




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

Auth::routes();

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');


Route::get('/home','PagesController@index');
Route::get('/','PagesController@index');

Route::get('/test','TestController@index');
Route::get('/test/{sort?}/{language?}/{country?}/{city?}','TestController@index');
Route::post('/getrating','RatingController@getRating');
Route::get('/filter/{sort?}/{language?}/{country?}/{city?}','PagesController@sort');
Route::get('/SignUp','PagesController@SignUp');

Route::group([ 'middleware' => [ 'auth', 'verified' ] ], function () {

Route::get('/calendar/{month}/{year}','CalendarController@calendar');
Route::post('/calendar/{month?}/{year?}','CalendarController@store');


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




Route::get('/message/{id}','ChatController@getMessage');
Route::post('/sendmessage','ChatController@sendMessage');
Route::post('/makeContact','ChatController@makeContact');
Route::post('/sendrating','RatingController@sendRating');


}); 



