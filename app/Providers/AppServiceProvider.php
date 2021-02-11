<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway ;
use App\Billing\PaymentGatewayContract;
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
        //
    }
}
