<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Conversations\V1\Conversation;

use Twilio\Page;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class ParticipantPage extends Page {
    public function __construct($version, $response, $solution) {
        parent::__construct($version, $response);

        // Path Solution
        $this->solution = $solution;
    }

    public function buildInstance(array $payload) {
        return new ParticipantInstance($this->version, $payload, $this->solution['conversationSid']);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Conversations.V1.ParticipantPage]';
    }
}