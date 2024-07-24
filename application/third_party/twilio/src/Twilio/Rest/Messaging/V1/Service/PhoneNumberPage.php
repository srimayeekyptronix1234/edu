<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Messaging\V1\Service;

use Twilio\Page;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class PhoneNumberPage extends Page {
    public function __construct($version, $response, $solution) {
        parent::__construct($version, $response);

        // Path Solution
        $this->solution = $solution;
    }

    public function buildInstance(array $payload) {
        return new PhoneNumberInstance($this->version, $payload, $this->solution['serviceSid']);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Messaging.V1.PhoneNumberPage]';
    }
}