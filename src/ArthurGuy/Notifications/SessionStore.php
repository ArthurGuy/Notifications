<?php

namespace ArthurGuy\Notifications;

interface SessionStore
{

    /**
     * Flash a message to the session.
     *
     * @param $name
     * @param $data
     */
    public function flash($name, $data);

    /**
     * See if a message exists in the session
     *
     * @param string $name
     * @return bool
     */
    public function has($name);

    /**
     * Get a message from the session
     *
     * @param string $name
     * @return bool
     */
    public function get($name);

} 