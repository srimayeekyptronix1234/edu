<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\BulkExports;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $resourceType
 * @property string $url
 * @property array $links
 */
class ExportInstance extends InstanceResource {
    protected $_days = null;
    protected $_exportCustomJobs = null;

    /**
     * Initialize the ExportInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $resourceType The resource_type
     * @return \Twilio\Rest\Preview\BulkExports\ExportInstance
     */
    public function __construct(Version $version, array $payload, $resourceType = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'resourceType' => Values::array_get($payload, 'resource_type'),
            'url' => Values::array_get($payload, 'url'),
            'links' => Values::array_get($payload, 'links'),
        );

        $this->solution = array('resourceType' => $resourceType ?: $this->properties['resourceType'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Preview\BulkExports\ExportContext Context for this
     *                                                        ExportInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new ExportContext($this->version, $this->solution['resourceType']);
        }

        return $this->context;
    }

    /**
     * Fetch a ExportInstance
     *
     * @return ExportInstance Fetched ExportInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Access the days
     *
     * @return \Twilio\Rest\Preview\BulkExports\Export\DayList
     */
    protected function getDays() {
        return $this->proxy()->days;
    }

    /**
     * Access the exportCustomJobs
     *
     * @return \Twilio\Rest\Preview\BulkExports\Export\ExportCustomJobList
     */
    protected function getExportCustomJobs() {
        return $this->proxy()->exportCustomJobs;
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
        return '[Twilio.Preview.BulkExports.ExportInstance ' . implode(' ', $context) . ']';
    }
}