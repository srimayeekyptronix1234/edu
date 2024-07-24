<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Messaging\V1\Session;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class WebhookContext extends InstanceContext {
    /**
     * Initialize the WebhookContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $sessionSid The SID of the Session with the Webhook resource
     *                           to fetch
     * @param string $sid The SID of the resource to fetch
     * @return \Twilio\Rest\Messaging\V1\Session\WebhookContext
     */
    public function __construct(Version $version, $sessionSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('sessionSid' => $sessionSid, 'sid' => $sid, );

        $this->uri = '/Sessions/' . rawurlencode($sessionSid) . '/Webhooks/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a WebhookInstance
     *
     * @return WebhookInstance Fetched WebhookInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new WebhookInstance(
            $this->version,
            $payload,
            $this->solution['sessionSid'],
            $this->solution['sid']
        );
    }

    /**
     * Update the WebhookInstance
     *
     * @param array|Options $options Optional Arguments
     * @return WebhookInstance Updated WebhookInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'Configuration.Url' => $options['configurationUrl'],
            'Configuration.Method' => $options['configurationMethod'],
            'Configuration.Filters' => Serialize::map($options['configurationFilters'], function($e) { return $e; }),
            'Configuration.Triggers' => Serialize::map($options['configurationTriggers'], function($e) { return $e; }),
            'Configuration.FlowSid' => $options['configurationFlowSid'],
            'Configuration.RetryCount' => $options['configurationRetryCount'],
            'Configuration.BufferMessages' => Serialize::booleanToString($options['configurationBufferMessages']),
            'Configuration.BufferWindow' => $options['configurationBufferWindow'],
        ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new WebhookInstance(
            $this->version,
            $payload,
            $this->solution['sessionSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the WebhookInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
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
        return '[Twilio.Messaging.V1.WebhookContext ' . implode(' ', $context) . ']';
    }
}