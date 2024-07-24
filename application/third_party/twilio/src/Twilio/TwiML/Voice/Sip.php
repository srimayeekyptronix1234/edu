<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Sip extends TwiML {
    /**
     * Sip constructor.
     *
     * @param string $sipUrl SIP URL
     * @param array $attributes Optional attributes
     */
    public function __construct($sipUrl, $attributes = array()) {
        parent::__construct('Sip', $sipUrl, $attributes);
    }

    /**
     * Add Username attribute.
     *
     * @param string $username SIP Username
     * @return static $this.
     */
    public function setUsername($username) {
        return $this->setAttribute('username', $username);
    }

    /**
     * Add Password attribute.
     *
     * @param string $password SIP Password
     * @return static $this.
     */
    public function setPassword($password) {
        return $this->setAttribute('password', $password);
    }

    /**
     * Add Url attribute.
     *
     * @param string $url Action URL
     * @return static $this.
     */
    public function setUrl($url) {
        return $this->setAttribute('url', $url);
    }

    /**
     * Add Method attribute.
     *
     * @param string $method Action URL method
     * @return static $this.
     */
    public function setMethod($method) {
        return $this->setAttribute('method', $method);
    }

    /**
     * Add StatusCallbackEvent attribute.
     *
     * @param string $statusCallbackEvent Status callback events
     * @return static $this.
     */
    public function setStatusCallbackEvent($statusCallbackEvent) {
        return $this->setAttribute('statusCallbackEvent', $statusCallbackEvent);
    }

    /**
     * Add StatusCallback attribute.
     *
     * @param string $statusCallback Status callback URL
     * @return static $this.
     */
    public function setStatusCallback($statusCallback) {
        return $this->setAttribute('statusCallback', $statusCallback);
    }

    /**
     * Add StatusCallbackMethod attribute.
     *
     * @param string $statusCallbackMethod Status callback URL method
     * @return static $this.
     */
    public function setStatusCallbackMethod($statusCallbackMethod) {
        return $this->setAttribute('statusCallbackMethod', $statusCallbackMethod);
    }
}