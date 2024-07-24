<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class SsmlSayAs extends TwiML {
    /**
     * SsmlSayAs constructor.
     *
     * @param string $words Words to be interpreted
     * @param array $attributes Optional attributes
     */
    public function __construct($words, $attributes = array()) {
        parent::__construct('say-as', $words, $attributes);
    }

    /**
     * Add Interpret-As attribute.
     *
     * @param string $interpretAs Specify the type of words are spoken
     * @return static $this.
     */
    public function setInterpretAs($interpretAs) {
        return $this->setAttribute('interpret-as', $interpretAs);
    }

    /**
     * Add Role attribute.
     *
     * @param string $role Specify the format of the date when interpret-as is set
     *                     to date
     * @return static $this.
     */
    public function setRole($role) {
        return $this->setAttribute('role', $role);
    }
}