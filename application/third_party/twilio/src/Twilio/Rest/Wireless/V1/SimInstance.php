<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Wireless\V1;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $sid
 * @property string $uniqueName
 * @property string $accountSid
 * @property string $ratePlanSid
 * @property string $friendlyName
 * @property string $iccid
 * @property string $eId
 * @property string $status
 * @property string $resetStatus
 * @property string $commandsCallbackUrl
 * @property string $commandsCallbackMethod
 * @property string $smsFallbackMethod
 * @property string $smsFallbackUrl
 * @property string $smsMethod
 * @property string $smsUrl
 * @property string $voiceFallbackMethod
 * @property string $voiceFallbackUrl
 * @property string $voiceMethod
 * @property string $voiceUrl
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $url
 * @property array $links
 * @property string $ipAddress
 */
class SimInstance extends InstanceResource {
    protected $_usageRecords = null;
    protected $_dataSessions = null;

    /**
     * Initialize the SimInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The SID of the Sim resource to fetch
     * @return \Twilio\Rest\Wireless\V1\SimInstance
     */
    public function __construct(Version $version, array $payload, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'sid' => Values::array_get($payload, 'sid'),
            'uniqueName' => Values::array_get($payload, 'unique_name'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'ratePlanSid' => Values::array_get($payload, 'rate_plan_sid'),
            'friendlyName' => Values::array_get($payload, 'friendly_name'),
            'iccid' => Values::array_get($payload, 'iccid'),
            'eId' => Values::array_get($payload, 'e_id'),
            'status' => Values::array_get($payload, 'status'),
            'resetStatus' => Values::array_get($payload, 'reset_status'),
            'commandsCallbackUrl' => Values::array_get($payload, 'commands_callback_url'),
            'commandsCallbackMethod' => Values::array_get($payload, 'commands_callback_method'),
            'smsFallbackMethod' => Values::array_get($payload, 'sms_fallback_method'),
            'smsFallbackUrl' => Values::array_get($payload, 'sms_fallback_url'),
            'smsMethod' => Values::array_get($payload, 'sms_method'),
            'smsUrl' => Values::array_get($payload, 'sms_url'),
            'voiceFallbackMethod' => Values::array_get($payload, 'voice_fallback_method'),
            'voiceFallbackUrl' => Values::array_get($payload, 'voice_fallback_url'),
            'voiceMethod' => Values::array_get($payload, 'voice_method'),
            'voiceUrl' => Values::array_get($payload, 'voice_url'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'url' => Values::array_get($payload, 'url'),
            'links' => Values::array_get($payload, 'links'),
            'ipAddress' => Values::array_get($payload, 'ip_address'),
        );

        $this->solution = array('sid' => $sid ?: $this->properties['sid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Wireless\V1\SimContext Context for this SimInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new SimContext($this->version, $this->solution['sid']);
        }

        return $this->context;
    }

    /**
     * Fetch a SimInstance
     *
     * @return SimInstance Fetched SimInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Update the SimInstance
     *
     * @param array|Options $options Optional Arguments
     * @return SimInstance Updated SimInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        return $this->proxy()->update($options);
    }

    /**
     * Deletes the SimInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Access the usageRecords
     *
     * @return \Twilio\Rest\Wireless\V1\Sim\UsageRecordList
     */
    protected function getUsageRecords() {
        return $this->proxy()->usageRecords;
    }

    /**
     * Access the dataSessions
     *
     * @return \Twilio\Rest\Wireless\V1\Sim\DataSessionList
     */
    protected function getDataSessions() {
        return $this->proxy()->dataSessions;
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
        return '[Twilio.Wireless.V1.SimInstance ' . implode(' ', $context) . ']';
    }
}