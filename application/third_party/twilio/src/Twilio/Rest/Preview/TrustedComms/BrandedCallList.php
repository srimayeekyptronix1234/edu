<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\TrustedComms;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class BrandedCallList extends ListResource {
    /**
     * Construct the BrandedCallList
     *
     * @param Version $version Version that contains the resource
     * @return \Twilio\Rest\Preview\TrustedComms\BrandedCallList
     */
    public function __construct(Version $version) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array();

        $this->uri = '/Business/BrandedCalls';
    }

    /**
     * Create a new BrandedCallInstance
     *
     * @param string $from Twilio number from which to brand the call
     * @param string $to The terminating Phone Number
     * @param string $reason The business reason for this phone call
     * @param array|Options $options Optional Arguments
     * @return BrandedCallInstance Newly created BrandedCallInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($from, $to, $reason, $options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'From' => $from,
            'To' => $to,
            'Reason' => $reason,
            'CallSid' => $options['callSid'],
        ));

        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new BrandedCallInstance($this->version, $payload);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Preview.TrustedComms.BrandedCallList]';
    }
}