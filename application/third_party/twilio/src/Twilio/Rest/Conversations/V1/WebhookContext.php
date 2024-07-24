<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Conversations\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class WebhookContext extends InstanceContext {
    /**
     * Initialize the WebhookContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @return \Twilio\Rest\Conversations\V1\WebhookContext
     */
    public function __construct(Version $version) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array();

        $this->uri = '/Conversations/Webhooks';
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

        return new WebhookInstance($this->version, $payload);
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
            'Method' => $options['method'],
            'Filters' => Serialize::map($options['filters'], function($e) { return $e; }),
            'PreWebhookUrl' => $options['preWebhookUrl'],
            'PostWebhookUrl' => $options['postWebhookUrl'],
            'Target' => $options['target'],
        ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new WebhookInstance($this->version, $payload);
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
        return '[Twilio.Conversations.V1.WebhookContext ' . implode(' ', $context) . ']';
    }
}