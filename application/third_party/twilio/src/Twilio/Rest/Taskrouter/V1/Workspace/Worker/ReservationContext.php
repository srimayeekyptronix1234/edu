<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Taskrouter\V1\Workspace\Worker;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

class ReservationContext extends InstanceContext {
    /**
     * Initialize the ReservationContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $workspaceSid The SID of the Workspace with the
     *                             WorkerReservation resource to fetch
     * @param string $workerSid The SID of the reserved Worker resource with the
     *                          WorkerReservation resource to fetch
     * @param string $sid The SID of the WorkerReservation resource to fetch
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\Worker\ReservationContext
     */
    public function __construct(Version $version, $workspaceSid, $workerSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('workspaceSid' => $workspaceSid, 'workerSid' => $workerSid, 'sid' => $sid, );

        $this->uri = '/Workspaces/' . rawurlencode($workspaceSid) . '/Workers/' . rawurlencode($workerSid) . '/Reservations/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a ReservationInstance
     *
     * @return ReservationInstance Fetched ReservationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new ReservationInstance(
            $this->version,
            $payload,
            $this->solution['workspaceSid'],
            $this->solution['workerSid'],
            $this->solution['sid']
        );
    }

    /**
     * Update the ReservationInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ReservationInstance Updated ReservationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'ReservationStatus' => $options['reservationStatus'],
            'WorkerActivitySid' => $options['workerActivitySid'],
            'Instruction' => $options['instruction'],
            'DequeuePostWorkActivitySid' => $options['dequeuePostWorkActivitySid'],
            'DequeueFrom' => $options['dequeueFrom'],
            'DequeueRecord' => $options['dequeueRecord'],
            'DequeueTimeout' => $options['dequeueTimeout'],
            'DequeueTo' => $options['dequeueTo'],
            'DequeueStatusCallbackUrl' => $options['dequeueStatusCallbackUrl'],
            'CallFrom' => $options['callFrom'],
            'CallRecord' => $options['callRecord'],
            'CallTimeout' => $options['callTimeout'],
            'CallTo' => $options['callTo'],
            'CallUrl' => $options['callUrl'],
            'CallStatusCallbackUrl' => $options['callStatusCallbackUrl'],
            'CallAccept' => Serialize::booleanToString($options['callAccept']),
            'RedirectCallSid' => $options['redirectCallSid'],
            'RedirectAccept' => Serialize::booleanToString($options['redirectAccept']),
            'RedirectUrl' => $options['redirectUrl'],
            'To' => $options['to'],
            'From' => $options['from'],
            'StatusCallback' => $options['statusCallback'],
            'StatusCallbackMethod' => $options['statusCallbackMethod'],
            'StatusCallbackEvent' => Serialize::map($options['statusCallbackEvent'], function($e) { return $e; }),
            'Timeout' => $options['timeout'],
            'Record' => Serialize::booleanToString($options['record']),
            'Muted' => Serialize::booleanToString($options['muted']),
            'Beep' => $options['beep'],
            'StartConferenceOnEnter' => Serialize::booleanToString($options['startConferenceOnEnter']),
            'EndConferenceOnExit' => Serialize::booleanToString($options['endConferenceOnExit']),
            'WaitUrl' => $options['waitUrl'],
            'WaitMethod' => $options['waitMethod'],
            'EarlyMedia' => Serialize::booleanToString($options['earlyMedia']),
            'MaxParticipants' => $options['maxParticipants'],
            'ConferenceStatusCallback' => $options['conferenceStatusCallback'],
            'ConferenceStatusCallbackMethod' => $options['conferenceStatusCallbackMethod'],
            'ConferenceStatusCallbackEvent' => Serialize::map($options['conferenceStatusCallbackEvent'], function($e) { return $e; }),
            'ConferenceRecord' => $options['conferenceRecord'],
            'ConferenceTrim' => $options['conferenceTrim'],
            'RecordingChannels' => $options['recordingChannels'],
            'RecordingStatusCallback' => $options['recordingStatusCallback'],
            'RecordingStatusCallbackMethod' => $options['recordingStatusCallbackMethod'],
            'ConferenceRecordingStatusCallback' => $options['conferenceRecordingStatusCallback'],
            'ConferenceRecordingStatusCallbackMethod' => $options['conferenceRecordingStatusCallbackMethod'],
            'Region' => $options['region'],
            'SipAuthUsername' => $options['sipAuthUsername'],
            'SipAuthPassword' => $options['sipAuthPassword'],
            'DequeueStatusCallbackEvent' => Serialize::map($options['dequeueStatusCallbackEvent'], function($e) { return $e; }),
            'PostWorkActivitySid' => $options['postWorkActivitySid'],
            'EndConferenceOnCustomerExit' => Serialize::booleanToString($options['endConferenceOnCustomerExit']),
            'BeepOnCustomerEntrance' => Serialize::booleanToString($options['beepOnCustomerEntrance']),
        ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new ReservationInstance(
            $this->version,
            $payload,
            $this->solution['workspaceSid'],
            $this->solution['workerSid'],
            $this->solution['sid']
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Taskrouter.V1.ReservationContext ' . implode(' ', $context) . ']';
    }
}