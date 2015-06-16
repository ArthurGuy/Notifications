<?php

namespace ArthurGuy\Notifications;

use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'ArthurGuy\Notifications\SessionStore',
            'ArthurGuy\Notifications\LaravelSessionStore'
        );

        $this->app->bindShared('notification', function () {
            return $this->app->make('ArthurGuy\Notifications\Notifier');
        });
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {

    }

}
