<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Values;
use Twilio\Version;

class BalanceList extends ListResource {
    /**
     * Construct the BalanceList
     *
     * @param Version $version Version that contains the resource
     * @param string $accountSid Account Sid.
     * @return \Twilio\Rest\Api\V2010\Account\BalanceList
     */
    public function __construct(Version $version, $accountSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('accountSid' => $accountSid, );

        $this->uri = '/Accounts/' . rawurlencode($accountSid) . '/Balance.json';
    }

    /**
     * Fetch a BalanceInstance
     *
     * @return BalanceInstance Fetched BalanceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new BalanceInstance($this->version, $payload, $this->solution['accountSid']);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Api.V2010.BalanceList]';
    }
}