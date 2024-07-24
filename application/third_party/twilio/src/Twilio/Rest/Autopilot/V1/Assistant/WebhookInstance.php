<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Autopilot\V1\Assistant;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $url
 * @property string $accountSid
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $assistantSid
 * @property string $sid
 * @property string $uniqueName
 * @property string $events
 * @property string $webhookUrl
 * @property string $webhookMethod
 */
class WebhookInstance extends InstanceResource {
    /**
     * Initialize the WebhookInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $assistantSid The SID of the Assistant that is the parent of
     *                             the resource
     * @param string $sid The unique string that identifies the resource to fetch
     * @return \Twilio\Rest\Autopilot\V1\Assistant\WebhookInstance
     */
    public function __construct(Version $version, array $payload, $assistantSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'url' => Values::array_get($payload, 'url'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'assistantSid' => Values::array_get($payload, 'assistant_sid'),
            'sid' => Values::array_get($payload, 'sid'),
            'uniqueName' => Values::array_get($payload, 'unique_name'),
            'events' => Values::array_get($payload, 'events'),
            'webhookUrl' => Values::array_get($payload, 'webhook_url'),
            'webhookMethod' => Values::array_get($payload, 'webhook_method'),
        );

        $this->solution = array('assistantSid' => $assistantSid, 'sid' => $sid ?: $this->properties['sid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Autopilot\V1\Assistant\WebhookContext Context for this
     *                                                            WebhookInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new WebhookContext(
                $this->version,
                $this->solution['assistantSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a WebhookInstance
     *
     * @return WebhookInstance Fetched WebhookInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Update the WebhookInstance
     *
     * @param array|Options $options Optional Arguments
     * @return WebhookInstance Updated WebhookInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        return $this->proxy()->update($options);
    }

    /**
     * Deletes the WebhookInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->proxy()->delete();
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
        return '[Twilio.Autopilot.V1.WebhookInstance ' . implode(' ', $context) . ']';
    }
}