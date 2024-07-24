<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\IpMessaging\V1\Service;

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
 * @property string $attributes
 * @property string $friendlyName
 * @property string $roleSid
 * @property string $identity
 * @property bool $isOnline
 * @property bool $isNotifiable
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property int $joinedChannelsCount
 * @property array $links
 * @property string $url
 */
class UserInstance extends InstanceResource {
    protected $_userChannels = null;

    /**
     * Initialize the UserInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid The SID of the Service that the resource is
     *                           associated with
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\IpMessaging\V1\Service\UserInstance
     */
    public function __construct(Version $version, array $payload, $serviceSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'sid' => Values::array_get($payload, 'sid'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'serviceSid' => Values::array_get($payload, 'service_sid'),
            'attributes' => Values::array_get($payload, 'attributes'),
            'friendlyName' => Values::array_get($payload, 'friendly_name'),
            'roleSid' => Values::array_get($payload, 'role_sid'),
            'identity' => Values::array_get($payload, 'identity'),
            'isOnline' => Values::array_get($payload, 'is_online'),
            'isNotifiable' => Values::array_get($payload, 'is_notifiable'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'joinedChannelsCount' => Values::array_get($payload, 'joined_channels_count'),
            'links' => Values::array_get($payload, 'links'),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array('serviceSid' => $serviceSid, 'sid' => $sid ?: $this->properties['sid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\IpMessaging\V1\Service\UserContext Context for this
     *                                                         UserInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new UserContext(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a UserInstance
     *
     * @return UserInstance Fetched UserInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the UserInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Update the UserInstance
     *
     * @param array|Options $options Optional Arguments
     * @return UserInstance Updated UserInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        return $this->proxy()->update($options);
    }

    /**
     * Access the userChannels
     *
     * @return \Twilio\Rest\IpMessaging\V1\Service\User\UserChannelList
     */
    protected function getUserChannels() {
        return $this->proxy()->userChannels;
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
        return '[Twilio.IpMessaging.V1.UserInstance ' . implode(' ', $context) . ']';
    }
}