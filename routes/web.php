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


use Illuminate\Support\Collection;

use Illuminate\Support\LazyCollection;
use App\Models\User;

Route::get('/lazy', function() {
    
    // $collection = Collection::times(10000)
    //     ->map(function($number){
    //         return pow(2,$number);
    //     })->all();

    $collection = LazyCollection::times(1000000)
        ->map(function($number){
            return pow(2,$number);
        })->all();

    // User::all()
    //User::cursor();
    return $collection;
});

Route::get('/generator', function() {

    // function happyFunction() {
    //     yield 'One';
    //     dump('1');
    //     yield 'Two';
    //     dump(2);
    //     yield 'Three';
    //     dump(3);
    //     yield 'Four';
    //     dump(4);
    //     yield 'Five';
    //     dump(5);
    //     yield 'Six';
    //     dump(6);
    // }

    // return get_class(happyFunction('Supper Happy')); 
    //return get_class_methods(happyFunction('Supper Happy'));
    // return happyFunction()->current();  
    // $return = happyFunction();  

    // dump($return->current());

    // $return->next();
    // dump($return->current());

    // dump($return->current());

    // $return->next();
    // dump($return->current());
    // $return->next();
    // dump($return->current());
    // $return->next();
    // dump($return->current());
    // $return->next();
    // dump($return->current());
    // $return->next();
    // dump($return->current());
    // $return->next();
    // dump($return->current());
    

    
    function happyFunction($strings) {
        foreach($strings as $string){
            dump('Start');
            yield($string);
            dump('end');
        };
    }


    foreach(happyFunction(['one','two','three']) as $results) {
        dump($results);
    }
});

Route::get('/generator2', function() {
  
    function notHappyFunction($number) {
        $return = [];
        for($i = 0; $i < $number;$i++){
            $return[] = $i;
        }
        return $return;
    }

     
    function HappyFunction($number) {
      
        for($i = 0; $i < $number;$i++){
           yield $i;
        }
   
    }


    foreach (HappyFunction(1000) as $number) {
        if($number % 1000 == 0){
            dump('Hello');
        }
    }

});



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



//repository pattern
// Route::get('/customer', [App\Http\Controllers\CustomerController::class, 'index']);
// Route::get('/customer/{customerID}', [App\Http\Controllers\CustomerController::class, 'show']);
// Route::get('/customer/{customerID}/update', [App\Http\Controllers\CustomerController::class, 'update']);
// Route::get('/customer/{customerID}/delete', [App\Http\Controllers\CustomerController::class, 'destroy']);

//version 2
// Route::get('/customer', [App\Http\Controllers\Customer2Controller::class, 'index']);
// Route::get('/customer/{customerID}', [App\Http\Controllers\Customer2Controller::class, 'show']);
// Route::get('/customer/{customerID}/update', [App\Http\Controllers\Customer2Controller::class, 'update']);
// Route::get('/customer/{customerID}/delete', [App\Http\Controllers\Customer2Controller::class, 'destroy']);

//version 3
Route::get('/customer', [App\Http\Controllers\Customer3Controller::class, 'index']);

Route::get('/customerarray', [App\Http\Controllers\Customer3Controller::class, 'samplearray']);
