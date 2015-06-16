<?php

if ( ! function_exists('notification')) {

    /**
     * Arrange for a flash message.
     *
     * @param  string|null $message
     * @return ArthurGuy\Notifications\Notifier
     */
    function notification($message = null)
    {
        /** @var ArthurGuy\Notifications\Notifier $notifier */
        $notifier = app('notification');

        if ( ! is_null($message)) {
            return $notifier->info($message);
        }

        return $notifier;
    }

}