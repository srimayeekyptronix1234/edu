<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\BulkExports\Export;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $redirectTo
 * @property string $day
 * @property int $size
 * @property string $resourceType
 */
class DayInstance extends InstanceResource {
    /**
     * Initialize the DayInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $resourceType The resource_type
     * @return \Twilio\Rest\Preview\BulkExports\Export\DayInstance
     */
    public function __construct(Version $version, array $payload, $resourceType) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'redirectTo' => Values::array_get($payload, 'redirect_to'),
            'day' => Values::array_get($payload, 'day'),
            'size' => Values::array_get($payload, 'size'),
            'resourceType' => Values::array_get($payload, 'resource_type'),
        );

        $this->solution = array('resourceType' => $resourceType, );
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
        return '[Twilio.Preview.BulkExports.DayInstance]';
    }
}