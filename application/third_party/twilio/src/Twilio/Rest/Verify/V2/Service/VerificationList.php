<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Verify\V2\Service;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class VerificationList extends ListResource {
    /**
     * Construct the VerificationList
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The SID of the Service that the resource is
     *                           associated with
     * @return \Twilio\Rest\Verify\V2\Service\VerificationList
     */
    public function __construct(Version $version, $serviceSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Verifications';
    }

    /**
     * Create a new VerificationInstance
     *
     * @param string $to The phone number to verify
     * @param string $channel The verification method to use
     * @param array|Options $options Optional Arguments
     * @return VerificationInstance Newly created VerificationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($to, $channel, $options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'To' => $to,
            'Channel' => $channel,
            'CustomMessage' => $options['customMessage'],
            'SendDigits' => $options['sendDigits'],
            'Locale' => $options['locale'],
            'CustomCode' => $options['customCode'],
            'Amount' => $options['amount'],
            'Payee' => $options['payee'],
            'RateLimits' => Serialize::jsonObject($options['rateLimits']),
        ));

        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new VerificationInstance($this->version, $payload, $this->solution['serviceSid']);
    }

    /**
     * Constructs a VerificationContext
     *
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Verify\V2\Service\VerificationContext
     */
    public function getContext($sid) {
        return new VerificationContext($this->version, $this->solution['serviceSid'], $sid);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Verify.V2.VerificationList]';
    }
}