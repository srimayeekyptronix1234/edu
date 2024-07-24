<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Authy\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $formType
 * @property array $forms
 * @property array $formMeta
 * @property string $url
 */
class FormInstance extends InstanceResource {
    /**
     * Initialize the FormInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $formType The Type of this Form
     * @return \Twilio\Rest\Authy\V1\FormInstance
     */
    public function __construct(Version $version, array $payload, $formType = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'formType' => Values::array_get($payload, 'form_type'),
            'forms' => Values::array_get($payload, 'forms'),
            'formMeta' => Values::array_get($payload, 'form_meta'),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array('formType' => $formType ?: $this->properties['formType'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Authy\V1\FormContext Context for this FormInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new FormContext($this->version, $this->solution['formType']);
        }

        return $this->context;
    }

    /**
     * Fetch a FormInstance
     *
     * @return FormInstance Fetched FormInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
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
        return '[Twilio.Authy.V1.FormInstance ' . implode(' ', $context) . ']';
    }
}