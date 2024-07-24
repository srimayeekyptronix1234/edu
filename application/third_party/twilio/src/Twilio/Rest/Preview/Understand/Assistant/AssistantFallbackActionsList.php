<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\Understand\Assistant;

use Twilio\ListResource;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class AssistantFallbackActionsList extends ListResource {
    /**
     * Construct the AssistantFallbackActionsList
     *
     * @param Version $version Version that contains the resource
     * @param string $assistantSid The assistant_sid
     * @return \Twilio\Rest\Preview\Understand\Assistant\AssistantFallbackActionsList
     */
    public function __construct(Version $version, $assistantSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('assistantSid' => $assistantSid, );
    }

    /**
     * Constructs a AssistantFallbackActionsContext
     *
     * @return \Twilio\Rest\Preview\Understand\Assistant\AssistantFallbackActionsContext
     */
    public function getContext() {
        return new AssistantFallbackActionsContext($this->version, $this->solution['assistantSid']);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Preview.Understand.AssistantFallbackActionsList]';
    }
}