<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Stop extends TwiML {
    /**
     * Stop constructor.
     */
    public function __construct() {
        parent::__construct('Stop', null);
    }

    /**
     * Add Stream child.
     *
     * @param array $attributes Optional attributes
     * @return Stream Child element.
     */
    public function stream($attributes = array()) {
        return $this->nest(new Stream($attributes));
    }

    /**
     * Add Siprec child.
     *
     * @param array $attributes Optional attributes
     * @return Siprec Child element.
     */
    public function siprec($attributes = array()) {
        return $this->nest(new Siprec($attributes));
    }
}