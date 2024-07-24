<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\Wireless\Sim;

use Twilio\ListResource;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class UsageList extends ListResource {
    /**
     * Construct the UsageList
     *
     * @param Version $version Version that contains the resource
     * @param string $simSid The sim_sid
     * @return \Twilio\Rest\Preview\Wireless\Sim\UsageList
     */
    public function __construct(Version $version, $simSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('simSid' => $simSid, );
    }

    /**
     * Constructs a UsageContext
     *
     * @return \Twilio\Rest\Preview\Wireless\Sim\UsageContext
     */
    public function getContext() {
        return new UsageContext($this->version, $this->solution['simSid']);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Preview.Wireless.UsageList]';
    }
}