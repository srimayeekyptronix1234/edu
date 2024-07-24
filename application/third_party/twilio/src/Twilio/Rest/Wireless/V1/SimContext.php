<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Wireless\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Rest\Wireless\V1\Sim\DataSessionList;
use Twilio\Rest\Wireless\V1\Sim\UsageRecordList;
use Twilio\Values;
use Twilio\Version;

/**
 * @property \Twilio\Rest\Wireless\V1\Sim\UsageRecordList $usageRecords
 * @property \Twilio\Rest\Wireless\V1\Sim\DataSessionList $dataSessions
 */
class SimContext extends InstanceContext {
    protected $_usageRecords = null;
    protected $_dataSessions = null;

    /**
     * Initialize the SimContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $sid The SID of the Sim resource to fetch
     * @return \Twilio\Rest\Wireless\V1\SimContext
     */
    public function __construct(Version $version, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('sid' => $sid, );

        $this->uri = '/Sims/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a SimInstance
     *
     * @return SimInstance Fetched SimInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new SimInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Update the SimInstance
     *
     * @param array|Options $options Optional Arguments
     * @return SimInstance Updated SimInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'UniqueName' => $options['uniqueName'],
            'CallbackMethod' => $options['callbackMethod'],
            'CallbackUrl' => $options['callbackUrl'],
            'FriendlyName' => $options['friendlyName'],
            'RatePlan' => $options['ratePlan'],
            'Status' => $options['status'],
            'CommandsCallbackMethod' => $options['commandsCallbackMethod'],
            'CommandsCallbackUrl' => $options['commandsCallbackUrl'],
            'SmsFallbackMethod' => $options['smsFallbackMethod'],
            'SmsFallbackUrl' => $options['smsFallbackUrl'],
            'SmsMethod' => $options['smsMethod'],
            'SmsUrl' => $options['smsUrl'],
            'VoiceFallbackMethod' => $options['voiceFallbackMethod'],
            'VoiceFallbackUrl' => $options['voiceFallbackUrl'],
            'VoiceMethod' => $options['voiceMethod'],
            'VoiceUrl' => $options['voiceUrl'],
            'ResetStatus' => $options['resetStatus'],
            'AccountSid' => $options['accountSid'],
        ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new SimInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Deletes the SimInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Access the usageRecords
     *
     * @return \Twilio\Rest\Wireless\V1\Sim\UsageRecordList
     */
    protected function getUsageRecords() {
        if (!$this->_usageRecords) {
            $this->_usageRecords = new UsageRecordList($this->version, $this->solution['sid']);
        }

        return $this->_usageRecords;
    }

    /**
     * Access the dataSessions
     *
     * @return \Twilio\Rest\Wireless\V1\Sim\DataSessionList
     */
    protected function getDataSessions() {
        if (!$this->_dataSessions) {
            $this->_dataSessions = new DataSessionList($this->version, $this->solution['sid']);
        }

        return $this->_dataSessions;
    }

    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return \Twilio\ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get($name) {
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown subresource ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return \Twilio\InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call($name, $arguments) {
        $property = $this->$name;
        if (method_exists($property, 'getContext')) {
            return call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
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
        return '[Twilio.Wireless.V1.SimContext ' . implode(' ', $context) . ']';
    }
}