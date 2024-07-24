<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\Wireless\Sim;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $simSid
 * @property string $simUniqueName
 * @property string $accountSid
 * @property array $period
 * @property array $commandsUsage
 * @property array $commandsCosts
 * @property array $dataUsage
 * @property array $dataCosts
 * @property string $url
 */
class UsageInstance extends InstanceResource {
    /**
     * Initialize the UsageInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $simSid The sim_sid
     * @return \Twilio\Rest\Preview\Wireless\Sim\UsageInstance
     */
    public function __construct(Version $version, array $payload, $simSid) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'simSid' => Values::array_get($payload, 'sim_sid'),
            'simUniqueName' => Values::array_get($payload, 'sim_unique_name'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'period' => Values::array_get($payload, 'period'),
            'commandsUsage' => Values::array_get($payload, 'commands_usage'),
            'commandsCosts' => Values::array_get($payload, 'commands_costs'),
            'dataUsage' => Values::array_get($payload, 'data_usage'),
            'dataCosts' => Values::array_get($payload, 'data_costs'),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array('simSid' => $simSid, );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Preview\Wireless\Sim\UsageContext Context for this
     *                                                        UsageInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new UsageContext($this->version, $this->solution['simSid']);
        }

        return $this->context;
    }

    /**
     * Fetch a UsageInstance
     *
     * @param array|Options $options Optional Arguments
     * @return UsageInstance Fetched UsageInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch($options = array()) {
        return $this->proxy()->fetch($options);
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
        return '[Twilio.Preview.Wireless.UsageInstance ' . implode(' ', $context) . ']';
    }
}