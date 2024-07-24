<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Monitor\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class EventContext extends InstanceContext {
    /**
     * Initialize the EventContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $sid The SID that identifies the resource to fetch
     * @return \Twilio\Rest\Monitor\V1\EventContext
     */
    public function __construct(Version $version, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('sid' => $sid, );

        $this->uri = '/Events/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a EventInstance
     *
     * @return EventInstance Fetched EventInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new EventInstance($this->version, $payload, $this->solution['sid']);
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
        return '[Twilio.Monitor.V1.EventContext ' . implode(' ', $context) . ']';
    }
}