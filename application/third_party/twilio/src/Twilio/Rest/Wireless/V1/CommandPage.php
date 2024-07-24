<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Wireless\V1;

use Twilio\Page;

class CommandPage extends Page {
    public function __construct($version, $response, $solution) {
        parent::__construct($version, $response);

        // Path Solution
        $this->solution = $solution;
    }

    public function buildInstance(array $payload) {
        return new CommandInstance($this->version, $payload);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Wireless.V1.CommandPage]';
    }
}