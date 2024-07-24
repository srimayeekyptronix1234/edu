<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Trunking\V1\Trunk;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class CredentialListContext extends InstanceContext {
    /**
     * Initialize the CredentialListContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $trunkSid The SID of the Trunk from which to fetch the
     *                         credential list
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Trunking\V1\Trunk\CredentialListContext
     */
    public function __construct(Version $version, $trunkSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('trunkSid' => $trunkSid, 'sid' => $sid, );

        $this->uri = '/Trunks/' . rawurlencode($trunkSid) . '/CredentialLists/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a CredentialListInstance
     *
     * @return CredentialListInstance Fetched CredentialListInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new CredentialListInstance(
            $this->version,
            $payload,
            $this->solution['trunkSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the CredentialListInstance
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
        return '[Twilio.Trunking.V1.CredentialListContext ' . implode(' ', $context) . ']';
    }
}