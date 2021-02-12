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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/pay', [App\Http\Controllers\PayOrderController::class, 'store']);

Route::get('/channels', [App\Http\Controllers\ChannelController::class, 'index'])->name('channel.index');
Route::get('/post', [App\Http\Controllers\PostController::class, 'create']);


use App\Mail\WelcomeMail;

Route::get('/notify', function (){

   
    
    $user = \App\Models\User::find(2);
   // Mail::to($user->email)->send(new WelcomeMail);

   $user->notify(new \App\Notifications\InvoicePay());

    //$user->readNotifications or unreadNotifications
    // return $user->readNotifications;
    //return $user->readNotifications[0]->data['amount'];
   // $user->notifications->first()->markAsRead(); 
//    return  $user->notifications;
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
