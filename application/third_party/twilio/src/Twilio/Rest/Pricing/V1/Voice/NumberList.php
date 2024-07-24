<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Pricing\V1\Voice;

use Twilio\ListResource;
use Twilio\Version;

class NumberList extends ListResource {
    /**
     * Construct the NumberList
     *
     * @param Version $version Version that contains the resource
     * @return \Twilio\Rest\Pricing\V1\Voice\NumberList
     */
    public function __construct(Version $version) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array();
    }

    /**
     * Constructs a NumberContext
     *
     * @param string $number The phone number to fetch
     * @return \Twilio\Rest\Pricing\V1\Voice\NumberContext
     */
    public function getContext($number) {
        return new NumberContext($this->version, $number);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Pricing.V1.NumberList]';
    }
}