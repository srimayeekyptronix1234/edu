<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Gather extends TwiML {
    /**
     * Gather constructor.
     *
     * @param array $attributes Optional attributes
     */
    public function __construct($attributes = array()) {
        parent::__construct('Gather', null, $attributes);
    }

    /**
     * Add Say child.
     *
     * @param string $message Message to say
     * @param array $attributes Optional attributes
     * @return Say Child element.
     */
    public function say($message, $attributes = array()) {
        return $this->nest(new Say($message, $attributes));
    }

    /**
     * Add Pause child.
     *
     * @param array $attributes Optional attributes
     * @return Pause Child element.
     */
    public function pause($attributes = array()) {
        return $this->nest(new Pause($attributes));
    }

    /**
     * Add Play child.
     *
     * @param string $url Media URL
     * @param array $attributes Optional attributes
     * @return Play Child element.
     */
    public function play($url = null, $attributes = array()) {
        return $this->nest(new Play($url, $attributes));
    }

    /**
     * Add Input attribute.
     *
     * @param string $input Input type Twilio should accept
     * @return static $this.
     */
    public function setInput($input) {
        return $this->setAttribute('input', $input);
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
     * @param int $timeout Time to wait to gather input
     * @return static $this.
     */
    public function setTimeout($timeout) {
        return $this->setAttribute('timeout', $timeout);
    }

    /**
     * Add SpeechTimeout attribute.
     *
     * @param string $speechTimeout Time to wait to gather speech input and it
     *                              should be either auto or a positive integer.
     * @return static $this.
     */
    public function setSpeechTimeout($speechTimeout) {
        return $this->setAttribute('speechTimeout', $speechTimeout);
    }

    /**
     * Add MaxSpeechTime attribute.
     *
     * @param int $maxSpeechTime Max allowed time for speech input
     * @return static $this.
     */
    public function setMaxSpeechTime($maxSpeechTime) {
        return $this->setAttribute('maxSpeechTime', $maxSpeechTime);
    }

    /**
     * Add ProfanityFilter attribute.
     *
     * @param bool $profanityFilter Profanity Filter on speech
     * @return static $this.
     */
    public function setProfanityFilter($profanityFilter) {
        return $this->setAttribute('profanityFilter', $profanityFilter);
    }

    /**
     * Add FinishOnKey attribute.
     *
     * @param string $finishOnKey Finish gather on key
     * @return static $this.
     */
    public function setFinishOnKey($finishOnKey) {
        return $this->setAttribute('finishOnKey', $finishOnKey);
    }

    /**
     * Add NumDigits attribute.
     *
     * @param int $numDigits Number of digits to collect
     * @return static $this.
     */
    public function setNumDigits($numDigits) {
        return $this->setAttribute('numDigits', $numDigits);
    }

    /**
     * Add PartialResultCallback attribute.
     *
     * @param string $partialResultCallback Partial result callback URL
     * @return static $this.
     */
    public function setPartialResultCallback($partialResultCallback) {
        return $this->setAttribute('partialResultCallback', $partialResultCallback);
    }

    /**
     * Add PartialResultCallbackMethod attribute.
     *
     * @param string $partialResultCallbackMethod Partial result callback URL method
     * @return static $this.
     */
    public function setPartialResultCallbackMethod($partialResultCallbackMethod) {
        return $this->setAttribute('partialResultCallbackMethod', $partialResultCallbackMethod);
    }

    /**
     * Add Language attribute.
     *
     * @param string $language Language to use
     * @return static $this.
     */
    public function setLanguage($language) {
        return $this->setAttribute('language', $language);
    }

    /**
     * Add Hints attribute.
     *
     * @param string $hints Speech recognition hints
     * @return static $this.
     */
    public function setHints($hints) {
        return $this->setAttribute('hints', $hints);
    }

    /**
     * Add BargeIn attribute.
     *
     * @param bool $bargeIn Stop playing media upon speech
     * @return static $this.
     */
    public function setBargeIn($bargeIn) {
        return $this->setAttribute('bargeIn', $bargeIn);
    }

    /**
     * Add Debug attribute.
     *
     * @param bool $debug Allow debug for gather
     * @return static $this.
     */
    public function setDebug($debug) {
        return $this->setAttribute('debug', $debug);
    }

    /**
     * Add ActionOnEmptyResult attribute.
     *
     * @param bool $actionOnEmptyResult Force webhook to the action URL event if
     *                                  there is no input
     * @return static $this.
     */
    public function setActionOnEmptyResult($actionOnEmptyResult) {
        return $this->setAttribute('actionOnEmptyResult', $actionOnEmptyResult);
    }
}