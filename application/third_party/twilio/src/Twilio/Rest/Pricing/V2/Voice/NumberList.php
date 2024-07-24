<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Pricing\V2\Voice;

use Twilio\ListResource;
use Twilio\Version;

class NumberList extends ListResource {
    /**
     * Construct the NumberList
     *
     * @param Version $version Version that contains the resource
     * @return \Twilio\Rest\Pricing\V2\Voice\NumberList
     */
    public function __construct(Version $version) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array();
    }

    /**
     * Constructs a NumberContext
     *
     * @param string $destinationNumber The destination number for which to fetch
     *                                  pricing information
     * @return \Twilio\Rest\Pricing\V2\Voice\NumberContext
     */
    public function getContext($destinationNumber) {
        return new NumberContext($this->version, $destinationNumber);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Pricing.V2.NumberList]';
    }
}