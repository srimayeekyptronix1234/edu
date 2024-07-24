<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\Marketplace;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $sid
 * @property string $friendlyName
 * @property string $description
 * @property string $pricingType
 * @property array $configurationSchema
 * @property string $url
 * @property array $links
 */
class AvailableAddOnInstance extends InstanceResource {
    protected $_extensions = null;

    /**
     * Initialize the AvailableAddOnInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The unique Available Add-on Sid
     * @return \Twilio\Rest\Preview\Marketplace\AvailableAddOnInstance
     */
    public function __construct(Version $version, array $payload, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'sid' => Values::array_get($payload, 'sid'),
            'friendlyName' => Values::array_get($payload, 'friendly_name'),
            'description' => Values::array_get($payload, 'description'),
            'pricingType' => Values::array_get($payload, 'pricing_type'),
            'configurationSchema' => Values::array_get($payload, 'configuration_schema'),
            'url' => Values::array_get($payload, 'url'),
            'links' => Values::array_get($payload, 'links'),
        );

        $this->solution = array('sid' => $sid ?: $this->properties['sid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Preview\Marketplace\AvailableAddOnContext Context for
     *                                                                this
     *                                                                AvailableAddOnInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new AvailableAddOnContext($this->version, $this->solution['sid']);
        }

        return $this->context;
    }

    /**
     * Fetch a AvailableAddOnInstance
     *
     * @return AvailableAddOnInstance Fetched AvailableAddOnInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Access the extensions
     *
     * @return \Twilio\Rest\Preview\Marketplace\AvailableAddOn\AvailableAddOnExtensionList
     */
    protected function getExtensions() {
        return $this->proxy()->extensions;
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
        return '[Twilio.Preview.Marketplace.AvailableAddOnInstance ' . implode(' ', $context) . ']';
    }
}