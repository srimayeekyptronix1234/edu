<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Trunking\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Rest\Trunking\V1\Trunk\CredentialListList;
use Twilio\Rest\Trunking\V1\Trunk\IpAccessControlListList;
use Twilio\Rest\Trunking\V1\Trunk\OriginationUrlList;
use Twilio\Rest\Trunking\V1\Trunk\PhoneNumberList;
use Twilio\Rest\Trunking\V1\Trunk\TerminatingSipDomainList;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * @property \Twilio\Rest\Trunking\V1\Trunk\OriginationUrlList $originationUrls
 * @property \Twilio\Rest\Trunking\V1\Trunk\CredentialListList $credentialsLists
 * @property \Twilio\Rest\Trunking\V1\Trunk\IpAccessControlListList $ipAccessControlLists
 * @property \Twilio\Rest\Trunking\V1\Trunk\PhoneNumberList $phoneNumbers
 * @property \Twilio\Rest\Trunking\V1\Trunk\TerminatingSipDomainList $terminatingSipDomains
 * @method \Twilio\Rest\Trunking\V1\Trunk\OriginationUrlContext originationUrls(string $sid)
 * @method \Twilio\Rest\Trunking\V1\Trunk\CredentialListContext credentialsLists(string $sid)
 * @method \Twilio\Rest\Trunking\V1\Trunk\IpAccessControlListContext ipAccessControlLists(string $sid)
 * @method \Twilio\Rest\Trunking\V1\Trunk\PhoneNumberContext phoneNumbers(string $sid)
 * @method \Twilio\Rest\Trunking\V1\Trunk\TerminatingSipDomainContext terminatingSipDomains(string $sid)
 */
class TrunkContext extends InstanceContext {
    protected $_originationUrls = null;
    protected $_credentialsLists = null;
    protected $_ipAccessControlLists = null;
    protected $_phoneNumbers = null;
    protected $_terminatingSipDomains = null;

    /**
     * Initialize the TrunkContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Trunking\V1\TrunkContext
     */
    public function __construct(Version $version, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('sid' => $sid, );

        $this->uri = '/Trunks/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a TrunkInstance
     *
     * @return TrunkInstance Fetched TrunkInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new TrunkInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Deletes the TrunkInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Update the TrunkInstance
     *
     * @param array|Options $options Optional Arguments
     * @return TrunkInstance Updated TrunkInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'FriendlyName' => $options['friendlyName'],
            'DomainName' => $options['domainName'],
            'DisasterRecoveryUrl' => $options['disasterRecoveryUrl'],
            'DisasterRecoveryMethod' => $options['disasterRecoveryMethod'],
            'Recording' => $options['recording'],
            'Secure' => Serialize::booleanToString($options['secure']),
            'CnamLookupEnabled' => Serialize::booleanToString($options['cnamLookupEnabled']),
        ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new TrunkInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Access the originationUrls
     *
     * @return \Twilio\Rest\Trunking\V1\Trunk\OriginationUrlList
     */
    protected function getOriginationUrls() {
        if (!$this->_originationUrls) {
            $this->_originationUrls = new OriginationUrlList($this->version, $this->solution['sid']);
        }

        return $this->_originationUrls;
    }

    /**
     * Access the credentialsLists
     *
     * @return \Twilio\Rest\Trunking\V1\Trunk\CredentialListList
     */
    protected function getCredentialsLists() {
        if (!$this->_credentialsLists) {
            $this->_credentialsLists = new CredentialListList($this->version, $this->solution['sid']);
        }

        return $this->_credentialsLists;
    }

    /**
     * Access the ipAccessControlLists
     *
     * @return \Twilio\Rest\Trunking\V1\Trunk\IpAccessControlListList
     */
    protected function getIpAccessControlLists() {
        if (!$this->_ipAccessControlLists) {
            $this->_ipAccessControlLists = new IpAccessControlListList($this->version, $this->solution['sid']);
        }

        return $this->_ipAccessControlLists;
    }

    /**
     * Access the phoneNumbers
     *
     * @return \Twilio\Rest\Trunking\V1\Trunk\PhoneNumberList
     */
    protected function getPhoneNumbers() {
        if (!$this->_phoneNumbers) {
            $this->_phoneNumbers = new PhoneNumberList($this->version, $this->solution['sid']);
        }

        return $this->_phoneNumbers;
    }

    /**
     * Access the terminatingSipDomains
     *
     * @return \Twilio\Rest\Trunking\V1\Trunk\TerminatingSipDomainList
     */
    protected function getTerminatingSipDomains() {
        if (!$this->_terminatingSipDomains) {
            $this->_terminatingSipDomains = new TerminatingSipDomainList(
                $this->version,
                $this->solution['sid']
            );
        }

        return $this->_terminatingSipDomains;
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
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Trunking.V1.TrunkContext ' . implode(' ', $context) . ']';
    }
}