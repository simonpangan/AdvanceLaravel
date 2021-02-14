<?php

namespace App\Providers;

use App\Models\Channel;
use App\Billing\BankPaymentGateway;
use Illuminate\Support\Facades\View;
use App\Billing\CreditPaymentGateway ;
use App\Billing\PaymentGatewayContract;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\ChannelsComposer;
use App\Service\PostcardSendingService;
use Illuminate\Support\Str;
use Illuminate\Contracts\Routing\ResponseFactory;
use App\Mixins\StrMixins;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(BankPaymentGateway::class, function($app) {
        //     return new BankPaymentGateway('usd');
        // }); //will return new object to every injection 
        // $this->app->singleton(PaymentGateway::class, function($app) {
        //     return new BankPaymentGateway('usd'); 
        // }); //implementationonly
        $this->app->singleton(PaymentGatewayContract::class, function($app) {

            if(request()->has('credit')){
                return new CreditPaymentGateway('usd');
            }else{
                return new BankPaymentGateway('usd');
            }
            
            //in the url add http://127.0.0.1:8000/pay?credit=true
        });//programming to interface
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //share channels  variable in all view
        //View::share('channels',Channel::orderBy('name')->get());

        //specify specific views  // 'post.*' - every single view that pertains to the post directory
        // View::composer(['post.create','channel.index'], function($view){
        //     $view->with('channels',Channel::orderBy('name'  )->get());
        // });
            
        //option 3 - encapulated -http view composer
        //View::composer(['post.create','channel.index'], ChannelsComposer::class);
        View::composer(['partials.channels.*'], ChannelsComposer::class);

        $this->app->singleton('Postcard', function($app) {
            return new PostcardSendingService('USA', 4, 6);
        });

       
        Str::macro('partNumber', function($part) {
            return 'AB-' . substr($part, 0, 3) . '-' . substr($part, 3);
        });

        // ResponseFactory::macro('errorJson', function($message = "Default Error Message") {
        //     return [
        //         'message' => $message,
        //         'error_code' => 123,
        //     ];
        // });

        Str::mixin(new StrMixins(), false); //false will not overwrite the first partNumber macro


    }
}
