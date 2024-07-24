<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account\Conference;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $accountSid
 * @property string $callSid
 * @property string $callSidToCoach
 * @property bool $coaching
 * @property string $conferenceSid
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property bool $endConferenceOnExit
 * @property bool $muted
 * @property bool $hold
 * @property bool $startConferenceOnEnter
 * @property string $status
 * @property string $uri
 */
class ParticipantInstance extends InstanceResource {
    /**
     * Initialize the ParticipantInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid The SID of the Account that created the resource
     * @param string $conferenceSid The SID of the conference the participant is in
     * @param string $callSid The Call SID of the resource to fetch
     * @return \Twilio\Rest\Api\V2010\Account\Conference\ParticipantInstance
     */
    public function __construct(Version $version, array $payload, $accountSid, $conferenceSid, $callSid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'callSid' => Values::array_get($payload, 'call_sid'),
            'callSidToCoach' => Values::array_get($payload, 'call_sid_to_coach'),
            'coaching' => Values::array_get($payload, 'coaching'),
            'conferenceSid' => Values::array_get($payload, 'conference_sid'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'endConferenceOnExit' => Values::array_get($payload, 'end_conference_on_exit'),
            'muted' => Values::array_get($payload, 'muted'),
            'hold' => Values::array_get($payload, 'hold'),
            'startConferenceOnEnter' => Values::array_get($payload, 'start_conference_on_enter'),
            'status' => Values::array_get($payload, 'status'),
            'uri' => Values::array_get($payload, 'uri'),
        );

        $this->solution = array(
            'accountSid' => $accountSid,
            'conferenceSid' => $conferenceSid,
            'callSid' => $callSid ?: $this->properties['callSid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Api\V2010\Account\Conference\ParticipantContext Context
     *                                                                      for
     *                                                                      this
     *                                                                      ParticipantInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new ParticipantContext(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['conferenceSid'],
                $this->solution['callSid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a ParticipantInstance
     *
     * @return ParticipantInstance Fetched ParticipantInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Update the ParticipantInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ParticipantInstance Updated ParticipantInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        return $this->proxy()->update($options);
    }

    /**
     * Deletes the ParticipantInstance
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
        return '[Twilio.Api.V2010.ParticipantInstance ' . implode(' ', $context) . ']';
    }
}