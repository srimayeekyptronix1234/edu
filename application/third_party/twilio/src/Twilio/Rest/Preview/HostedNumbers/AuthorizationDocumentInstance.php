<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\HostedNumbers;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $sid
 * @property string $addressSid
 * @property string $status
 * @property string $email
 * @property string $ccEmails
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $url
 * @property array $links
 */
class AuthorizationDocumentInstance extends InstanceResource {
    protected $_dependentHostedNumberOrders = null;

    /**
     * Initialize the AuthorizationDocumentInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid AuthorizationDocument sid.
     * @return \Twilio\Rest\Preview\HostedNumbers\AuthorizationDocumentInstance
     */
    public function __construct(Version $version, array $payload, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'sid' => Values::array_get($payload, 'sid'),
            'addressSid' => Values::array_get($payload, 'address_sid'),
            'status' => Values::array_get($payload, 'status'),
            'email' => Values::array_get($payload, 'email'),
            'ccEmails' => Values::array_get($payload, 'cc_emails'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'url' => Values::array_get($payload, 'url'),
            'links' => Values::array_get($payload, 'links'),
        );

        $this->solution = array('sid' => $sid ?: $this->properties['sid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Preview\HostedNumbers\AuthorizationDocumentContext Context for this AuthorizationDocumentInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new AuthorizationDocumentContext($this->version, $this->solution['sid']);
        }

        return $this->context;
    }

    /**
     * Fetch a AuthorizationDocumentInstance
     *
     * @return AuthorizationDocumentInstance Fetched AuthorizationDocumentInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Update the AuthorizationDocumentInstance
     *
     * @param array|Options $options Optional Arguments
     * @return AuthorizationDocumentInstance Updated AuthorizationDocumentInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        return $this->proxy()->update($options);
    }

    /**
     * Access the dependentHostedNumberOrders
     *
     * @return \Twilio\Rest\Preview\HostedNumbers\AuthorizationDocument\DependentHostedNumberOrderList
     */
    protected function getDependentHostedNumberOrders() {
        return $this->proxy()->dependentHostedNumberOrders;
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
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
        return '[Twilio.Preview.HostedNumbers.AuthorizationDocumentInstance ' . implode(' ', $context) . ']';
    }
}