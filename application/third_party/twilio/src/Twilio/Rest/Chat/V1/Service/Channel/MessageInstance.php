<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Chat\V1\Service\Channel;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $sid
 * @property string $accountSid
 * @property string $attributes
 * @property string $serviceSid
 * @property string $to
 * @property string $channelSid
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property bool $wasEdited
 * @property string $from
 * @property string $body
 * @property int $index
 * @property string $url
 */
class MessageInstance extends InstanceResource {
    /**
     * Initialize the MessageInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid The SID of the Service that the resource is
     *                           associated with
     * @param string $channelSid The unique ID of the Channel the Message resource
     *                           belongs to
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Chat\V1\Service\Channel\MessageInstance
     */
    public function __construct(Version $version, array $payload, $serviceSid, $channelSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'sid' => Values::array_get($payload, 'sid'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'attributes' => Values::array_get($payload, 'attributes'),
            'serviceSid' => Values::array_get($payload, 'service_sid'),
            'to' => Values::array_get($payload, 'to'),
            'channelSid' => Values::array_get($payload, 'channel_sid'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'wasEdited' => Values::array_get($payload, 'was_edited'),
            'from' => Values::array_get($payload, 'from'),
            'body' => Values::array_get($payload, 'body'),
            'index' => Values::array_get($payload, 'index'),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array(
            'serviceSid' => $serviceSid,
            'channelSid' => $channelSid,
            'sid' => $sid ?: $this->properties['sid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Chat\V1\Service\Channel\MessageContext Context for this
     *                                                             MessageInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new MessageContext(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['channelSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a MessageInstance
     *
     * @return MessageInstance Fetched MessageInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the MessageInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Update the MessageInstance
     *
     * @param array|Options $options Optional Arguments
     * @return MessageInstance Updated MessageInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        return $this->proxy()->update($options);
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
        return '[Twilio.Chat.V1.MessageInstance ' . implode(' ', $context) . ']';
    }
}