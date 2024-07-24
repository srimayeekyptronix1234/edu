<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Authy\V1\Service\Entity\Factor;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class ChallengeList extends ListResource {
    /**
     * Construct the ChallengeList
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid Service Sid.
     * @param string $identity Unique identity of the Entity
     * @param string $factorSid Factor Sid.
     * @return \Twilio\Rest\Authy\V1\Service\Entity\Factor\ChallengeList
     */
    public function __construct(Version $version, $serviceSid, $identity, $factorSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array(
            'serviceSid' => $serviceSid,
            'identity' => $identity,
            'factorSid' => $factorSid,
        );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Entities/' . rawurlencode($identity) . '/Factors/' . rawurlencode($factorSid) . '/Challenges';
    }

    /**
     * Create a new ChallengeInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ChallengeInstance Newly created ChallengeInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'ExpirationDate' => Serialize::iso8601DateTime($options['expirationDate']),
            'Details' => $options['details'],
            'HiddenDetails' => $options['hiddenDetails'],
        ));

        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new ChallengeInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['identity'],
            $this->solution['factorSid']
        );
    }

    /**
     * Constructs a ChallengeContext
     *
     * @param string $sid A string that uniquely identifies this Challenge, or
     *                    `latest`.
     * @return \Twilio\Rest\Authy\V1\Service\Entity\Factor\ChallengeContext
     */
    public function getContext($sid) {
        return new ChallengeContext(
            $this->version,
            $this->solution['serviceSid'],
            $this->solution['identity'],
            $this->solution['factorSid'],
            $sid
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Authy.V1.ChallengeList]';
    }
}