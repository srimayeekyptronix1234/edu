<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Video\V1;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $sid
 * @property string $status
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $accountSid
 * @property bool $enableTurn
 * @property string $uniqueName
 * @property string $statusCallback
 * @property string $statusCallbackMethod
 * @property \DateTime $endTime
 * @property int $duration
 * @property string $type
 * @property int $maxParticipants
 * @property bool $recordParticipantsOnConnect
 * @property string $videoCodecs
 * @property string $mediaRegion
 * @property string $url
 * @property array $links
 */
class RoomInstance extends InstanceResource {
    protected $_recordings = null;
    protected $_participants = null;

    /**
     * Initialize the RoomInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The SID that identifies the resource to fetch
     * @return \Twilio\Rest\Video\V1\RoomInstance
     */
    public function __construct(Version $version, array $payload, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'sid' => Values::array_get($payload, 'sid'),
            'status' => Values::array_get($payload, 'status'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'enableTurn' => Values::array_get($payload, 'enable_turn'),
            'uniqueName' => Values::array_get($payload, 'unique_name'),
            'statusCallback' => Values::array_get($payload, 'status_callback'),
            'statusCallbackMethod' => Values::array_get($payload, 'status_callback_method'),
            'endTime' => Deserialize::dateTime(Values::array_get($payload, 'end_time')),
            'duration' => Values::array_get($payload, 'duration'),
            'type' => Values::array_get($payload, 'type'),
            'maxParticipants' => Values::array_get($payload, 'max_participants'),
            'recordParticipantsOnConnect' => Values::array_get($payload, 'record_participants_on_connect'),
            'videoCodecs' => Values::array_get($payload, 'video_codecs'),
            'mediaRegion' => Values::array_get($payload, 'media_region'),
            'url' => Values::array_get($payload, 'url'),
            'links' => Values::array_get($payload, 'links'),
        );

        $this->solution = array('sid' => $sid ?: $this->properties['sid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Video\V1\RoomContext Context for this RoomInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new RoomContext($this->version, $this->solution['sid']);
        }

        return $this->context;
    }

    /**
     * Fetch a RoomInstance
     *
     * @return RoomInstance Fetched RoomInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Update the RoomInstance
     *
     * @param string $status The new status of the resource
     * @return RoomInstance Updated RoomInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($status) {
        return $this->proxy()->update($status);
    }

    /**
     * Access the recordings
     *
     * @return \Twilio\Rest\Video\V1\Room\RoomRecordingList
     */
    protected function getRecordings() {
        return $this->proxy()->recordings;
    }

    /**
     * Access the participants
     *
     * @return \Twilio\Rest\Video\V1\Room\ParticipantList
     */
    protected function getParticipants() {
        return $this->proxy()->participants;
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
        return '[Twilio.Video.V1.RoomInstance ' . implode(' ', $context) . ']';
    }
}