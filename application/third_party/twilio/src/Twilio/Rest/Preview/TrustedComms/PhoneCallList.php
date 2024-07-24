<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\TrustedComms;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class PhoneCallList extends ListResource {
    /**
     * Construct the PhoneCallList
     *
     * @param Version $version Version that contains the resource
     * @return \Twilio\Rest\Preview\TrustedComms\PhoneCallList
     */
    public function __construct(Version $version) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array();

        $this->uri = '/Business/PhoneCalls';
    }

    /**
     * Create a new PhoneCallInstance
     *
     * @param string $from Twilio number from which to originate the call
     * @param string $to The terminating Phone Number
     * @param array|Options $options Optional Arguments
     * @return PhoneCallInstance Newly created PhoneCallInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($from, $to, $options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'From' => $from,
            'To' => $to,
            'Reason' => $options['reason'],
            'ApplicationSid' => $options['applicationSid'],
            'CallerId' => $options['callerId'],
            'FallbackMethod' => $options['fallbackMethod'],
            'FallbackUrl' => $options['fallbackUrl'],
            'MachineDetection' => $options['machineDetection'],
            'MachineDetectionSilenceTimeout' => $options['machineDetectionSilenceTimeout'],
            'MachineDetectionSpeechEndThreshold' => $options['machineDetectionSpeechEndThreshold'],
            'MachineDetectionSpeechThreshold' => $options['machineDetectionSpeechThreshold'],
            'MachineDetectionTimeout' => $options['machineDetectionTimeout'],
            'Method' => $options['method'],
            'Record' => Serialize::booleanToString($options['record']),
            'RecordingChannels' => $options['recordingChannels'],
            'RecordingStatusCallback' => $options['recordingStatusCallback'],
            'RecordingStatusCallbackEvent' => Serialize::map($options['recordingStatusCallbackEvent'], function($e) { return $e; }),
            'RecordingStatusCallbackMethod' => $options['recordingStatusCallbackMethod'],
            'SendDigits' => $options['sendDigits'],
            'SipAuthPassword' => $options['sipAuthPassword'],
            'SipAuthUsername' => $options['sipAuthUsername'],
            'StatusCallback' => $options['statusCallback'],
            'StatusCallbackEvent' => Serialize::map($options['statusCallbackEvent'], function($e) { return $e; }),
            'StatusCallbackMethod' => $options['statusCallbackMethod'],
            'Timeout' => $options['timeout'],
            'Trim' => $options['trim'],
            'Url' => $options['url'],
        ));

        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new PhoneCallInstance($this->version, $payload);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Preview.TrustedComms.PhoneCallList]';
    }
}