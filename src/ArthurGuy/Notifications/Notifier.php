<?php

namespace ArthurGuy\Notifications;

use Illuminate\Support\MessageBag;

class Notifier
{

    /**
     * The session writer.
     *
     * @var SessionStore
     */
    private $session;

    /**
     * Create a new flash notifier instance.
     *
     * @param SessionStore $session
     */
    function __construct(SessionStore $session)
    {
        $this->session = $session;
    }

    /**
     * Flash an information message.
     *
     * @param string     $message
     * @param MessageBag $details
     * @return $this
     */
    public function info($message, MessageBag $details = null)
    {
        $this->message($message, $details, 'info');

        return $this;
    }

    /**
     * Flash a success message.
     *
     * @param  string    $message
     * @param MessageBag $details
     * @return $this
     */
    public function success($message, MessageBag $details = null)
    {
        $this->message($message, $details, 'success');

        return $this;
    }

    /**
     * Flash an error message.
     *
     * @param  string    $message
     * @param MessageBag $details
     * @return $this
     */
    public function error($message, MessageBag $details = null)
    {
        $this->message($message, $details, 'danger');

        return $this;
    }

    /**
     * Flash a warning message.
     *
     * @param  string    $message
     * @param MessageBag $details
     * @return $this
     */
    public function warning($message, MessageBag $details = null)
    {
        $this->message($message, $details, 'warning');

        return $this;
    }


    /**
     * Flash a general message.
     *
     * @param  string    $message
     * @param MessageBag $details
     * @param  string    $level
     * @return $this
     */
    public function message($message, MessageBag $details = null, $level = 'info')
    {
        $this->session->flash('flash_notification.message', $message);
        $this->session->flash('flash_notification.details', $details);
        $this->session->flash('flash_notification.level', $level);

        return $this;
    }

    /**
     * Add an "important" flash to the session.
     *
     * @return $this
     */
    public function important()
    {
        $this->session->flash('flash_notification.important', true);

        return $this;
    }

    /**
     * @return bool
     */
    public function hasMessage()
    {
        return $this->session->has('flash_notification.message');
    }

    /**
     * @param string      $detail
     * @param null|string $response
     * @return bool|null
     */
    public function hasErrorDetail($detail, $response = null)
    {
        $details = $this->session->get('flash_notification.details');
        if ($details && $details->has($detail)) {
            if ($response) {
                return $response;
            } else {
                return true;
            }
        }
        return false;
    }

    /**
     * @return bool
     */
    public function hasDetails()
    {
        return ! $this->getDetails()->isEmpty();
    }

    /**
     * @return MessageBag
     */
    public function getDetails()
    {
        $details = $this->session->get('flash_notification.details');
        if ( ! ($details instanceof MessageBag)) {
            return new MessageBag();
        }
        return $details;
    }

    /**
     * @param string $detail
     * @param string $responseFormat
     * @return mixed
     */
    public function getErrorDetail($detail, $responseFormat = '<span class="help-block">:message</span>')
    {
        $details = $this->session->get('flash_notification.details');
        if ($this->hasErrorDetail($detail)) {
            return $details->first($detail, $responseFormat);
        }
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->session->get('flash_notification.message');
    }

    /**
     * @return string
     */
    public function getLevel()
    {
        return $this->session->get('flash_notification.level');
    }

}
