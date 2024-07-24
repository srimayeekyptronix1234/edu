<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Video\V1\Room;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class RoomRecordingContext extends InstanceContext {
    /**
     * Initialize the RoomRecordingContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $roomSid The SID of the Room resource with the recording to
     *                        fetch
     * @param string $sid The SID that identifies the resource to fetch
     * @return \Twilio\Rest\Video\V1\Room\RoomRecordingContext
     */
    public function __construct(Version $version, $roomSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('roomSid' => $roomSid, 'sid' => $sid, );

        $this->uri = '/Rooms/' . rawurlencode($roomSid) . '/Recordings/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a RoomRecordingInstance
     *
     * @return RoomRecordingInstance Fetched RoomRecordingInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new RoomRecordingInstance(
            $this->version,
            $payload,
            $this->solution['roomSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the RoomRecordingInstance
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
        return '[Twilio.Video.V1.RoomRecordingContext ' . implode(' ', $context) . ']';
    }
}