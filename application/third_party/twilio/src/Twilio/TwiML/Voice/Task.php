<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Task extends TwiML {
    /**
     * Task constructor.
     *
     * @param string $body TaskRouter task attributes
     * @param array $attributes Optional attributes
     */
    public function __construct($body, $attributes = array()) {
        parent::__construct('Task', $body, $attributes);
    }

    /**
     * Add Priority attribute.
     *
     * @param int $priority Task priority
     * @return static $this.
     */
    public function setPriority($priority) {
        return $this->setAttribute('priority', $priority);
    }

    /**
     * Add Timeout attribute.
     *
     * @param int $timeout Timeout associated with task
     * @return static $this.
     */
    public function setTimeout($timeout) {
        return $this->setAttribute('timeout', $timeout);
    }
}