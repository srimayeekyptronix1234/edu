<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Lookups\V1;

use Twilio\ListResource;
use Twilio\Version;

class PhoneNumberList extends ListResource {
    /**
     * Construct the PhoneNumberList
     *
     * @param Version $version Version that contains the resource
     * @return \Twilio\Rest\Lookups\V1\PhoneNumberList
     */
    public function __construct(Version $version) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array();
    }

    /**
     * Constructs a PhoneNumberContext
     *
     * @param string $phoneNumber The phone number to fetch in E.164 format
     * @return \Twilio\Rest\Lookups\V1\PhoneNumberContext
     */
    public function getContext($phoneNumber) {
        return new PhoneNumberContext($this->version, $phoneNumber);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Lookups.V1.PhoneNumberList]';
    }
}