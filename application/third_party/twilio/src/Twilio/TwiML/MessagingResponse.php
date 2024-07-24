<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML;

class MessagingResponse extends TwiML {
    /**
     * MessagingResponse constructor.
     */
    public function __construct() {
        parent::__construct('Response', null);
    }

    /**
     * Add Message child.
     *
     * @param string $body Message Body
     * @param array $attributes Optional attributes
     * @return Messaging\Message Child element.
     */
    public function message($body, $attributes = array()) {
        return $this->nest(new Messaging\Message($body, $attributes));
    }

    /**
     * Add Redirect child.
     *
     * @param string $url Redirect URL
     * @param array $attributes Optional attributes
     * @return Messaging\Redirect Child element.
     */
    public function redirect($url, $attributes = array()) {
        return $this->nest(new Messaging\Redirect($url, $attributes));
    }
}