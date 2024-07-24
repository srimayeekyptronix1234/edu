<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\Understand\Assistant;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class AssistantInitiationActionsContext extends InstanceContext {
    /**
     * Initialize the AssistantInitiationActionsContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $assistantSid The assistant_sid
     * @return \Twilio\Rest\Preview\Understand\Assistant\AssistantInitiationActionsContext
     */
    public function __construct(Version $version, $assistantSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('assistantSid' => $assistantSid, );

        $this->uri = '/Assistants/' . rawurlencode($assistantSid) . '/InitiationActions';
    }

    /**
     * Fetch a AssistantInitiationActionsInstance
     *
     * @return AssistantInitiationActionsInstance Fetched
     *                                            AssistantInitiationActionsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new AssistantInitiationActionsInstance(
            $this->version,
            $payload,
            $this->solution['assistantSid']
        );
    }

    /**
     * Update the AssistantInitiationActionsInstance
     *
     * @param array|Options $options Optional Arguments
     * @return AssistantInitiationActionsInstance Updated
     *                                            AssistantInitiationActionsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'InitiationActions' => Serialize::jsonObject($options['initiationActions']),
        ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new AssistantInitiationActionsInstance(
            $this->version,
            $payload,
            $this->solution['assistantSid']
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Preview.Understand.AssistantInitiationActionsContext ' . implode(' ', $context) . ']';
    }
}