<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\TrustedComms;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $cpsUrl
 * @property string $phoneNumber
 * @property string $url
 */
class CpsInstance extends InstanceResource {
    /**
     * Initialize the CpsInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @return \Twilio\Rest\Preview\TrustedComms\CpsInstance
     */
    public function __construct(Version $version, array $payload) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'cpsUrl' => Values::array_get($payload, 'cps_url'),
            'phoneNumber' => Values::array_get($payload, 'phone_number'),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array();
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Preview\TrustedComms\CpsContext Context for this
     *                                                      CpsInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new CpsContext($this->version);
        }

        return $this->context;
    }

    /**
     * Fetch a CpsInstance
     *
     * @return CpsInstance Fetched CpsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
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
        return '[Twilio.Preview.TrustedComms.CpsInstance ' . implode(' ', $context) . ']';
    }
}