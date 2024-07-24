<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account\Conference;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

class RecordingContext extends InstanceContext {
    /**
     * Initialize the RecordingContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $accountSid The SID of the Account that created the resource
     *                           to fetch
     * @param string $conferenceSid Fetch by unique Conference SID for the recording
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Api\V2010\Account\Conference\RecordingContext
     */
    public function __construct(Version $version, $accountSid, $conferenceSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array(
            'accountSid' => $accountSid,
            'conferenceSid' => $conferenceSid,
            'sid' => $sid,
        );

        $this->uri = '/Accounts/' . rawurlencode($accountSid) . '/Conferences/' . rawurlencode($conferenceSid) . '/Recordings/' . rawurlencode($sid) . '.json';
    }

    /**
     * Update the RecordingInstance
     *
     * @param string $status The new status of the recording
     * @param array|Options $options Optional Arguments
     * @return RecordingInstance Updated RecordingInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($status, $options = array()) {
        $options = new Values($options);

        $data = Values::of(array('Status' => $status, 'PauseBehavior' => $options['pauseBehavior'], ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new RecordingInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['conferenceSid'],
            $this->solution['sid']
        );
    }

    /**
     * Fetch a RecordingInstance
     *
     * @return RecordingInstance Fetched RecordingInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new RecordingInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['conferenceSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the RecordingInstance
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
        return '[Twilio.Api.V2010.RecordingContext ' . implode(' ', $context) . ']';
    }
}