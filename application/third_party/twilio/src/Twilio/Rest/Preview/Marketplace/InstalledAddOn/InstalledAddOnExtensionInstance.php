<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\Marketplace\InstalledAddOn;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $sid
 * @property string $installedAddOnSid
 * @property string $friendlyName
 * @property string $productName
 * @property string $uniqueName
 * @property bool $enabled
 * @property string $url
 */
class InstalledAddOnExtensionInstance extends InstanceResource {
    /**
     * Initialize the InstalledAddOnExtensionInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $installedAddOnSid The installed_add_on_sid
     * @param string $sid The unique Extension Sid
     * @return \Twilio\Rest\Preview\Marketplace\InstalledAddOn\InstalledAddOnExtensionInstance
     */
    public function __construct(Version $version, array $payload, $installedAddOnSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'sid' => Values::array_get($payload, 'sid'),
            'installedAddOnSid' => Values::array_get($payload, 'installed_add_on_sid'),
            'friendlyName' => Values::array_get($payload, 'friendly_name'),
            'productName' => Values::array_get($payload, 'product_name'),
            'uniqueName' => Values::array_get($payload, 'unique_name'),
            'enabled' => Values::array_get($payload, 'enabled'),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array(
            'installedAddOnSid' => $installedAddOnSid,
            'sid' => $sid ?: $this->properties['sid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Preview\Marketplace\InstalledAddOn\InstalledAddOnExtensionContext Context for this
     *                                                                                        InstalledAddOnExtensionInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new InstalledAddOnExtensionContext(
                $this->version,
                $this->solution['installedAddOnSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a InstalledAddOnExtensionInstance
     *
     * @return InstalledAddOnExtensionInstance Fetched
     *                                         InstalledAddOnExtensionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Update the InstalledAddOnExtensionInstance
     *
     * @param bool $enabled A Boolean indicating if the Extension will be invoked
     * @return InstalledAddOnExtensionInstance Updated
     *                                         InstalledAddOnExtensionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($enabled) {
        return $this->proxy()->update($enabled);
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
        return '[Twilio.Preview.Marketplace.InstalledAddOnExtensionInstance ' . implode(' ', $context) . ']';
    }
}