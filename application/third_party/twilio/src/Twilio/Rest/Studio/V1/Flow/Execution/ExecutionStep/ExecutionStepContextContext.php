<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Studio\V1\Flow\Execution\ExecutionStep;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class ExecutionStepContextContext extends InstanceContext {
    /**
     * Initialize the ExecutionStepContextContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $flowSid The SID of the Flow
     * @param string $executionSid The SID of the Execution
     * @param string $stepSid Step SID
     * @return \Twilio\Rest\Studio\V1\Flow\Execution\ExecutionStep\ExecutionStepContextContext
     */
    public function __construct(Version $version, $flowSid, $executionSid, $stepSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array(
            'flowSid' => $flowSid,
            'executionSid' => $executionSid,
            'stepSid' => $stepSid,
        );

        $this->uri = '/Flows/' . rawurlencode($flowSid) . '/Executions/' . rawurlencode($executionSid) . '/Steps/' . rawurlencode($stepSid) . '/Context';
    }

    /**
     * Fetch a ExecutionStepContextInstance
     *
     * @return ExecutionStepContextInstance Fetched ExecutionStepContextInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new ExecutionStepContextInstance(
            $this->version,
            $payload,
            $this->solution['flowSid'],
            $this->solution['executionSid'],
            $this->solution['stepSid']
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
        return '[Twilio.Studio.V1.ExecutionStepContextContext ' . implode(' ', $context) . ']';
    }
}