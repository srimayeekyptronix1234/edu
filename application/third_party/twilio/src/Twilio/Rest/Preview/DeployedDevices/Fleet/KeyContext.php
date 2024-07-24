<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\DeployedDevices\Fleet;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class KeyContext extends InstanceContext {
    /**
     * Initialize the KeyContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $fleetSid The fleet_sid
     * @param string $sid A string that uniquely identifies the Key.
     * @return \Twilio\Rest\Preview\DeployedDevices\Fleet\KeyContext
     */
    public function __construct(Version $version, $fleetSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('fleetSid' => $fleetSid, 'sid' => $sid, );

        $this->uri = '/Fleets/' . rawurlencode($fleetSid) . '/Keys/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a KeyInstance
     *
     * @return KeyInstance Fetched KeyInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new KeyInstance(
            $this->version,
            $payload,
            $this->solution['fleetSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the KeyInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Update the KeyInstance
     *
     * @param array|Options $options Optional Arguments
     * @return KeyInstance Updated KeyInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'FriendlyName' => $options['friendlyName'],
            'DeviceSid' => $options['deviceSid'],
        ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new KeyInstance(
            $this->version,
            $payload,
            $this->solution['fleetSid'],
            $this->solution['sid']
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
        return '[Twilio.Preview.DeployedDevices.KeyContext ' . implode(' ', $context) . ']';
    }
}