<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Trunking\V1\Trunk;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class IpAccessControlListContext extends InstanceContext {
    /**
     * Initialize the IpAccessControlListContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $trunkSid The SID of the Trunk from which to fetch the IP
     *                         Access Control List
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Trunking\V1\Trunk\IpAccessControlListContext
     */
    public function __construct(Version $version, $trunkSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('trunkSid' => $trunkSid, 'sid' => $sid, );

        $this->uri = '/Trunks/' . rawurlencode($trunkSid) . '/IpAccessControlLists/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a IpAccessControlListInstance
     *
     * @return IpAccessControlListInstance Fetched IpAccessControlListInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new IpAccessControlListInstance(
            $this->version,
            $payload,
            $this->solution['trunkSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the IpAccessControlListInstance
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
        return '[Twilio.Trunking.V1.IpAccessControlListContext ' . implode(' ', $context) . ']';
    }
}