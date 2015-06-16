<?php

namespace ArthurGuy\Notifications;

use Illuminate\Session\Store;

class LaravelSessionStore implements SessionStore {

    /**
     * @var Store
     */
    private $session;

    /**
     * @param Store $session
     */
    function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Flash a message to the session.
     *
     * @param $name
     * @param $data
     */
    public function flash($name, $data)
    {
        $this->session->flash($name, $data);
    }

    /**
     * See if a message exists in the session
     *
     * @param string $name
     * @return bool
     */
    public function has($name)
    {
        return $this->session->has($name);
    }

    /**
     * Get a message from the session
     *
     * @param string $name
     * @return bool
     */
    public function get($name)
    {
        return $this->session->get($name);
    }
}