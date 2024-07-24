<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class SsmlEmphasis extends TwiML {
    /**
     * SsmlEmphasis constructor.
     *
     * @param string $words Words to emphasize
     * @param array $attributes Optional attributes
     */
    public function __construct($words, $attributes = array()) {
        parent::__construct('emphasis', $words, $attributes);
    }

    /**
     * Add Level attribute.
     *
     * @param string $level Specify the degree of emphasis
     * @return static $this.
     */
    public function setLevel($level) {
        return $this->setAttribute('level', $level);
    }
}