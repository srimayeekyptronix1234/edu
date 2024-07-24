<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Accounts\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Rest\Accounts\V1\Credential\AwsList;
use Twilio\Rest\Accounts\V1\Credential\PublicKeyList;
use Twilio\Version;

/**
 * @property \Twilio\Rest\Accounts\V1\Credential\PublicKeyList $publicKey
 * @property \Twilio\Rest\Accounts\V1\Credential\AwsList $aws
 * @method \Twilio\Rest\Accounts\V1\Credential\PublicKeyContext publicKey(string $sid)
 * @method \Twilio\Rest\Accounts\V1\Credential\AwsContext aws(string $sid)
 */
class CredentialList extends ListResource {
    protected $_publicKey = null;
    protected $_aws = null;

    /**
     * Construct the CredentialList
     *
     * @param Version $version Version that contains the resource
     * @return \Twilio\Rest\Accounts\V1\CredentialList
     */
    public function __construct(Version $version) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array();
    }

    /**
     * Access the publicKey
     */
    protected function getPublicKey() {
        if (!$this->_publicKey) {
            $this->_publicKey = new PublicKeyList($this->version);
        }

        return $this->_publicKey;
    }

    /**
     * Access the aws
     */
    protected function getAws() {
        if (!$this->_aws) {
            $this->_aws = new AwsList($this->version);
        }

        return $this->_aws;
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
        return '[Twilio.Accounts.V1.CredentialList]';
    }
}