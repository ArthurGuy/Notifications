<?php

namespace ArthurGuy\Notifications;

use Illuminate\Support\Facades\Facade;

class NotificationFacade extends Facade
{

    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'notification';
    }

} 