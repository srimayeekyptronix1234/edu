<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Dial extends TwiML {
    /**
     * Dial constructor.
     *
     * @param string $number Phone number to dial
     * @param array $attributes Optional attributes
     */
    public function __construct($number = null, $attributes = array()) {
        parent::__construct('Dial', $number, $attributes);
    }

    /**
     * Add Client child.
     *
     * @param string $identity Client identity
     * @param array $attributes Optional attributes
     * @return Client Child element.
     */
    public function client($identity = null, $attributes = array()) {
        return $this->nest(new Client($identity, $attributes));
    }

    /**
     * Add Conference child.
     *
     * @param string $name Conference name
     * @param array $attributes Optional attributes
     * @return Conference Child element.
     */
    public function conference($name, $attributes = array()) {
        return $this->nest(new Conference($name, $attributes));
    }

    /**
     * Add Number child.
     *
     * @param string $phoneNumber Phone Number to dial
     * @param array $attributes Optional attributes
     * @return Number Child element.
     */
    public function number($phoneNumber, $attributes = array()) {
        return $this->nest(new Number($phoneNumber, $attributes));
    }

    /**
     * Add Queue child.
     *
     * @param string $name Queue name
     * @param array $attributes Optional attributes
     * @return Queue Child element.
     */
    public function queue($name, $attributes = array()) {
        return $this->nest(new Queue($name, $attributes));
    }

    /**
     * Add Sim child.
     *
     * @param string $simSid SIM SID
     * @return Sim Child element.
     */
    public function sim($simSid) {
        return $this->nest(new Sim($simSid));
    }

    /**
     * Add Sip child.
     *
     * @param string $sipUrl SIP URL
     * @param array $attributes Optional attributes
     * @return Sip Child element.
     */
    public function sip($sipUrl, $attributes = array()) {
        return $this->nest(new Sip($sipUrl, $attributes));
    }

    /**
     * Add Action attribute.
     *
     * @param string $action Action URL
     * @return static $this.
     */
    public function setAction($action) {
        return $this->setAttribute('action', $action);
    }

    /**
     * Add Method attribute.
     *
     * @param string $method Action URL method
     * @return static $this.
     */
    public function setMethod($method) {
        return $this->setAttribute('method', $method);
    }

    /**
     * Add Timeout attribute.
     *
     * @param int $timeout Time to wait for answer
     * @return static $this.
     */
    public function setTimeout($timeout) {
        return $this->setAttribute('timeout', $timeout);
    }

    /**
     * Add HangupOnStar attribute.
     *
     * @param bool $hangupOnStar Hangup call on star press
     * @return static $this.
     */
    public function setHangupOnStar($hangupOnStar) {
        return $this->setAttribute('hangupOnStar', $hangupOnStar);
    }

    /**
     * Add TimeLimit attribute.
     *
     * @param int $timeLimit Max time length
     * @return static $this.
     */
    public function setTimeLimit($timeLimit) {
        return $this->setAttribute('timeLimit', $timeLimit);
    }

    /**
     * Add CallerId attribute.
     *
     * @param string $callerId Caller ID to display
     * @return static $this.
     */
    public function setCallerId($callerId) {
        return $this->setAttribute('callerId', $callerId);
    }

    /**
     * Add Record attribute.
     *
     * @param string $record Record the call
     * @return static $this.
     */
    public function setRecord($record) {
        return $this->setAttribute('record', $record);
    }

    /**
     * Add Trim attribute.
     *
     * @param string $trim Trim the recording
     * @return static $this.
     */
    public function setTrim($trim) {
        return $this->setAttribute('trim', $trim);
    }

    /**
     * Add RecordingStatusCallback attribute.
     *
     * @param string $recordingStatusCallback Recording status callback URL
     * @return static $this.
     */
    public function setRecordingStatusCallback($recordingStatusCallback) {
        return $this->setAttribute('recordingStatusCallback', $recordingStatusCallback);
    }

    /**
     * Add RecordingStatusCallbackMethod attribute.
     *
     * @param string $recordingStatusCallbackMethod Recording status callback URL
     *                                              method
     * @return static $this.
     */
    public function setRecordingStatusCallbackMethod($recordingStatusCallbackMethod) {
        return $this->setAttribute('recordingStatusCallbackMethod', $recordingStatusCallbackMethod);
    }

    /**
     * Add RecordingStatusCallbackEvent attribute.
     *
     * @param string $recordingStatusCallbackEvent Recording status callback events
     * @return static $this.
     */
    public function setRecordingStatusCallbackEvent($recordingStatusCallbackEvent) {
        return $this->setAttribute('recordingStatusCallbackEvent', $recordingStatusCallbackEvent);
    }

    /**
     * Add AnswerOnBridge attribute.
     *
     * @param bool $answerOnBridge Preserve the ringing behavior of the inbound
     *                             call until the Dialed call picks up
     * @return static $this.
     */
    public function setAnswerOnBridge($answerOnBridge) {
        return $this->setAttribute('answerOnBridge', $answerOnBridge);
    }

    /**
     * Add RingTone attribute.
     *
     * @param string $ringTone Ringtone allows you to override the ringback tone
     *                         that Twilio will play back to the caller while
     *                         executing the Dial
     * @return static $this.
     */
    public function setRingTone($ringTone) {
        return $this->setAttribute('ringTone', $ringTone);
    }
}