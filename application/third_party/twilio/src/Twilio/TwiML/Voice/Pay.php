<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Pay extends TwiML {
    /**
     * Pay constructor.
     *
     * @param array $attributes Optional attributes
     */
    public function __construct($attributes = array()) {
        parent::__construct('Pay', null, $attributes);
    }

    /**
     * Add Prompt child.
     *
     * @param array $attributes Optional attributes
     * @return Prompt Child element.
     */
    public function prompt($attributes = array()) {
        return $this->nest(new Prompt($attributes));
    }

    /**
     * Add Parameter child.
     *
     * @param array $attributes Optional attributes
     * @return Parameter Child element.
     */
    public function parameter($attributes = array()) {
        return $this->nest(new Parameter($attributes));
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
     * Add BankAccountType attribute.
     *
     * @param string $bankAccountType Bank account type for ach transactions. If
     *                                set, payment method attribute must be
     *                                provided and value should be set to
     *                                ach-debit. defaults to consumer-checking
     * @return static $this.
     */
    public function setBankAccountType($bankAccountType) {
        return $this->setAttribute('bankAccountType', $bankAccountType);
    }

    /**
     * Add StatusCallback attribute.
     *
     * @param string $statusCallback Status callback URL
     * @return static $this.
     */
    public function setStatusCallback($statusCallback) {
        return $this->setAttribute('statusCallback', $statusCallback);
    }

    /**
     * Add StatusCallbackMethod attribute.
     *
     * @param string $statusCallbackMethod Status callback method
     * @return static $this.
     */
    public function setStatusCallbackMethod($statusCallbackMethod) {
        return $this->setAttribute('statusCallbackMethod', $statusCallbackMethod);
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
     * Add MaxAttempts attribute.
     *
     * @param int $maxAttempts Maximum number of allowed retries when gathering
     *                         input
     * @return static $this.
     */
    public function setMaxAttempts($maxAttempts) {
        return $this->setAttribute('maxAttempts', $maxAttempts);
    }

    /**
     * Add SecurityCode attribute.
     *
     * @param bool $securityCode Prompt for security code
     * @return static $this.
     */
    public function setSecurityCode($securityCode) {
        return $this->setAttribute('securityCode', $securityCode);
    }

    /**
     * Add PostalCode attribute.
     *
     * @param string $postalCode Prompt for postal code and it should be true/false
     *                           or default postal code
     * @return static $this.
     */
    public function setPostalCode($postalCode) {
        return $this->setAttribute('postalCode', $postalCode);
    }

    /**
     * Add MinPostalCodeLength attribute.
     *
     * @param int $minPostalCodeLength Prompt for minimum postal code length
     * @return static $this.
     */
    public function setMinPostalCodeLength($minPostalCodeLength) {
        return $this->setAttribute('minPostalCodeLength', $minPostalCodeLength);
    }

    /**
     * Add PaymentConnector attribute.
     *
     * @param string $paymentConnector Unique name for payment connector
     * @return static $this.
     */
    public function setPaymentConnector($paymentConnector) {
        return $this->setAttribute('paymentConnector', $paymentConnector);
    }

    /**
     * Add PaymentMethod attribute.
     *
     * @param string $paymentMethod Payment method to be used. defaults to
     *                              credit-card
     * @return static $this.
     */
    public function setPaymentMethod($paymentMethod) {
        return $this->setAttribute('paymentMethod', $paymentMethod);
    }

    /**
     * Add TokenType attribute.
     *
     * @param string $tokenType Type of token
     * @return static $this.
     */
    public function setTokenType($tokenType) {
        return $this->setAttribute('tokenType', $tokenType);
    }

    /**
     * Add ChargeAmount attribute.
     *
     * @param string $chargeAmount Amount to process. If value is greater than 0
     *                             then make the payment else create a payment token
     * @return static $this.
     */
    public function setChargeAmount($chargeAmount) {
        return $this->setAttribute('chargeAmount', $chargeAmount);
    }

    /**
     * Add Currency attribute.
     *
     * @param string $currency Currency of the amount attribute
     * @return static $this.
     */
    public function setCurrency($currency) {
        return $this->setAttribute('currency', $currency);
    }

    /**
     * Add Description attribute.
     *
     * @param string $description Details regarding the payment
     * @return static $this.
     */
    public function setDescription($description) {
        return $this->setAttribute('description', $description);
    }

    /**
     * Add ValidCardTypes attribute.
     *
     * @param string $validCardTypes Comma separated accepted card types
     * @return static $this.
     */
    public function setValidCardTypes($validCardTypes) {
        return $this->setAttribute('validCardTypes', $validCardTypes);
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
}