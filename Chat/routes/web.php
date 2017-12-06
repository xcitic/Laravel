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

use App\Events\MessagePosted;

Route::get('/', function () {
    return view('welcome');
});


Route::get('chat', function () {
  return view('chat');
})->middleware('auth');

Route::get('/messages', function () {
  return App\Message::with('user')->get();
})->middleware('auth');


Route::post('/messages', function () {
  // Check User Authenticated
  $user = Auth::user();

  // Save message to database
  $message = $user->messages()->create([
    'message' => request()->get('message')
  ]);

  // Announce that a new message has been posted
  broadcast(new MessagePosted($message, $user))->toOthers();

  return ['status' => 'Yes'];

})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
