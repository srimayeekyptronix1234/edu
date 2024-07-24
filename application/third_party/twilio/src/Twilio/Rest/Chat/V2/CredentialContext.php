<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Chat\V2;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

class CredentialContext extends InstanceContext {
    /**
     * Initialize the CredentialContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $sid The SID of the Credential resource to fetch
     * @return \Twilio\Rest\Chat\V2\CredentialContext
     */
    public function __construct(Version $version, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('sid' => $sid, );

        $this->uri = '/Credentials/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a CredentialInstance
     *
     * @return CredentialInstance Fetched CredentialInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new CredentialInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Update the CredentialInstance
     *
     * @param array|Options $options Optional Arguments
     * @return CredentialInstance Updated CredentialInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'FriendlyName' => $options['friendlyName'],
            'Certificate' => $options['certificate'],
            'PrivateKey' => $options['privateKey'],
            'Sandbox' => Serialize::booleanToString($options['sandbox']),
            'ApiKey' => $options['apiKey'],
            'Secret' => $options['secret'],
        ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new CredentialInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Deletes the CredentialInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
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
        return '[Twilio.Chat.V2.CredentialContext ' . implode(' ', $context) . ']';
    }
}