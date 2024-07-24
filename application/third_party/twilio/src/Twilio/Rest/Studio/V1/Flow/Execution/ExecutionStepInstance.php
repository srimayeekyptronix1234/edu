<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Studio\V1\Flow\Execution;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $sid
 * @property string $accountSid
 * @property string $flowSid
 * @property string $executionSid
 * @property string $name
 * @property array $context
 * @property string $transitionedFrom
 * @property string $transitionedTo
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $url
 * @property array $links
 */
class ExecutionStepInstance extends InstanceResource {
    protected $_stepContext = null;

    /**
     * Initialize the ExecutionStepInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $flowSid The SID of the Flow
     * @param string $executionSid The SID of the Execution
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Studio\V1\Flow\Execution\ExecutionStepInstance
     */
    public function __construct(Version $version, array $payload, $flowSid, $executionSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'sid' => Values::array_get($payload, 'sid'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'flowSid' => Values::array_get($payload, 'flow_sid'),
            'executionSid' => Values::array_get($payload, 'execution_sid'),
            'name' => Values::array_get($payload, 'name'),
            'context' => Values::array_get($payload, 'context'),
            'transitionedFrom' => Values::array_get($payload, 'transitioned_from'),
            'transitionedTo' => Values::array_get($payload, 'transitioned_to'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'url' => Values::array_get($payload, 'url'),
            'links' => Values::array_get($payload, 'links'),
        );

        $this->solution = array(
            'flowSid' => $flowSid,
            'executionSid' => $executionSid,
            'sid' => $sid ?: $this->properties['sid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Studio\V1\Flow\Execution\ExecutionStepContext Context
     *                                                                    for this
     *                                                                    ExecutionStepInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new ExecutionStepContext(
                $this->version,
                $this->solution['flowSid'],
                $this->solution['executionSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a ExecutionStepInstance
     *
     * @return ExecutionStepInstance Fetched ExecutionStepInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Access the stepContext
     *
     * @return \Twilio\Rest\Studio\V1\Flow\Execution\ExecutionStep\ExecutionStepContextList
     */
    protected function getStepContext() {
        return $this->proxy()->stepContext;
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
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
        return '[Twilio.Studio.V1.ExecutionStepInstance ' . implode(' ', $context) . ']';
    }
}