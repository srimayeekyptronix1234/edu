<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Fax\V1\Fax;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class FaxMediaContext extends InstanceContext {
    /**
     * Initialize the FaxMediaContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $faxSid The SID of the fax with the FaxMedia resource to fetch
     * @param string $sid The unique string that identifies the resource to fetch
     * @return \Twilio\Rest\Fax\V1\Fax\FaxMediaContext
     */
    public function __construct(Version $version, $faxSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('faxSid' => $faxSid, 'sid' => $sid, );

        $this->uri = '/Faxes/' . rawurlencode($faxSid) . '/Media/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a FaxMediaInstance
     *
     * @return FaxMediaInstance Fetched FaxMediaInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new FaxMediaInstance(
            $this->version,
            $payload,
            $this->solution['faxSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the FaxMediaInstance
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
        return '[Twilio.Fax.V1.FaxMediaContext ' . implode(' ', $context) . ']';
    }
}