<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

class NewSigningKeyList extends ListResource {
    /**
     * Construct the NewSigningKeyList
     *
     * @param Version $version Version that contains the resource
     * @param string $accountSid A 34 character string that uniquely identifies
     *                           this resource.
     * @return \Twilio\Rest\Api\V2010\Account\NewSigningKeyList
     */
    public function __construct(Version $version, $accountSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('accountSid' => $accountSid, );

        $this->uri = '/Accounts/' . rawurlencode($accountSid) . '/SigningKeys.json';
    }

    /**
     * Create a new NewSigningKeyInstance
     *
     * @param array|Options $options Optional Arguments
     * @return NewSigningKeyInstance Newly created NewSigningKeyInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($options = array()) {
        $options = new Values($options);

        $data = Values::of(array('FriendlyName' => $options['friendlyName'], ));

        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new NewSigningKeyInstance($this->version, $payload, $this->solution['accountSid']);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Api.V2010.NewSigningKeyList]';
    }
}