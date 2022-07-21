<?php

namespace App\Providers;

use App\Services\Newsletter;
use Illuminate\Pagination\Paginator;
use App\Services\MailchimpNewsletter;
use MailchimpMarketing\Configuration;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(MailchimpNewsletter::class, function () {
            $client = (new Configuration)->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us8'
            ]);

            return new MailchimpNewsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();
    }
}
