<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account\Sip\Domain;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Rest\Api\V2010\Account\Sip\Domain\AuthTypes\AuthTypeCallsList;
use Twilio\Rest\Api\V2010\Account\Sip\Domain\AuthTypes\AuthTypeRegistrationsList;
use Twilio\Version;

/**
 * @property \Twilio\Rest\Api\V2010\Account\Sip\Domain\AuthTypes\AuthTypeCallsList $calls
 * @property \Twilio\Rest\Api\V2010\Account\Sip\Domain\AuthTypes\AuthTypeRegistrationsList $registrations
 */
class AuthTypesList extends ListResource {
    protected $_calls = null;
    protected $_registrations = null;

    /**
     * Construct the AuthTypesList
     *
     * @param Version $version Version that contains the resource
     * @param string $accountSid The SID of the Account that created the resource
     * @param string $domainSid The unique string that identifies the resource
     * @return \Twilio\Rest\Api\V2010\Account\Sip\Domain\AuthTypesList
     */
    public function __construct(Version $version, $accountSid, $domainSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('accountSid' => $accountSid, 'domainSid' => $domainSid, );
    }

    /**
     * Access the calls
     */
    protected function getCalls() {
        if (!$this->_calls) {
            $this->_calls = new AuthTypeCallsList(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['domainSid']
            );
        }

        return $this->_calls;
    }

    /**
     * Access the registrations
     */
    protected function getRegistrations() {
        if (!$this->_registrations) {
            $this->_registrations = new AuthTypeRegistrationsList(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['domainSid']
            );
        }

        return $this->_registrations;
    }

    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return \Twilio\ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get($name) {
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown subresource ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return \Twilio\InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call($name, $arguments) {
        $property = $this->$name;
        if (method_exists($property, 'getContext')) {
            return call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Api.V2010.AuthTypesList]';
    }
}