<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Chat\V1\Service;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $sid
 * @property string $accountSid
 * @property string $serviceSid
 * @property string $friendlyName
 * @property string $uniqueName
 * @property string $attributes
 * @property string $type
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $createdBy
 * @property int $membersCount
 * @property int $messagesCount
 * @property string $url
 * @property array $links
 */
class ChannelInstance extends InstanceResource {
    protected $_members = null;
    protected $_messages = null;
    protected $_invites = null;

    /**
     * Initialize the ChannelInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid The SID of the Service that the resource is
     *                           associated with
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Chat\V1\Service\ChannelInstance
     */
    public function __construct(Version $version, array $payload, $serviceSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'sid' => Values::array_get($payload, 'sid'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'serviceSid' => Values::array_get($payload, 'service_sid'),
            'friendlyName' => Values::array_get($payload, 'friendly_name'),
            'uniqueName' => Values::array_get($payload, 'unique_name'),
            'attributes' => Values::array_get($payload, 'attributes'),
            'type' => Values::array_get($payload, 'type'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'createdBy' => Values::array_get($payload, 'created_by'),
            'membersCount' => Values::array_get($payload, 'members_count'),
            'messagesCount' => Values::array_get($payload, 'messages_count'),
            'url' => Values::array_get($payload, 'url'),
            'links' => Values::array_get($payload, 'links'),
        );

        $this->solution = array('serviceSid' => $serviceSid, 'sid' => $sid ?: $this->properties['sid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Chat\V1\Service\ChannelContext Context for this
     *                                                     ChannelInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new ChannelContext(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a ChannelInstance
     *
     * @return ChannelInstance Fetched ChannelInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the ChannelInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Update the ChannelInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ChannelInstance Updated ChannelInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        return $this->proxy()->update($options);
    }

    /**
     * Access the members
     *
     * @return \Twilio\Rest\Chat\V1\Service\Channel\MemberList
     */
    protected function getMembers() {
        return $this->proxy()->members;
    }

    /**
     * Access the messages
     *
     * @return \Twilio\Rest\Chat\V1\Service\Channel\MessageList
     */
    protected function getMessages() {
        return $this->proxy()->messages;
    }

    /**
     * Access the invites
     *
     * @return \Twilio\Rest\Chat\V1\Service\Channel\InviteList
     */
    protected function getInvites() {
        return $this->proxy()->invites;
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
        return '[Twilio.Chat.V1.ChannelInstance ' . implode(' ', $context) . ']';
    }
}