<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class SsmlSub extends TwiML {
    /**
     * SsmlSub constructor.
     *
     * @param string $words Words to be substituted
     * @param array $attributes Optional attributes
     */
    public function __construct($words, $attributes = array()) {
        parent::__construct('sub', $words, $attributes);
    }

    /**
     * Add Alias attribute.
     *
     * @param string $alias Substitute a different word (or pronunciation) for
     *                      selected text such as an acronym or abbreviation
     * @return static $this.
     */
    public function setAlias($alias) {
        return $this->setAttribute('alias', $alias);
    }
}