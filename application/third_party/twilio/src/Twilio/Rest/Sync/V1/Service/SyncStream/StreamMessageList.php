<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Sync\V1\Service\SyncStream;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class StreamMessageList extends ListResource {
    /**
     * Construct the StreamMessageList
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The SID of the Sync Service that the resource is
     *                           associated with
     * @param string $streamSid The unique string that identifies the resource
     * @return \Twilio\Rest\Sync\V1\Service\SyncStream\StreamMessageList
     */
    public function __construct(Version $version, $serviceSid, $streamSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, 'streamSid' => $streamSid, );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Streams/' . rawurlencode($streamSid) . '/Messages';
    }

    /**
     * Create a new StreamMessageInstance
     *
     * @param array $data A JSON string that represents an arbitrary, schema-less
     *                    object that makes up the Stream Message body
     * @return StreamMessageInstance Newly created StreamMessageInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($data) {
        $data = Values::of(array('Data' => Serialize::jsonObject($data), ));

        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new StreamMessageInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['streamSid']
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Sync.V1.StreamMessageList]';
    }
}