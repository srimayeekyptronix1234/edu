<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\BulkExports;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Rest\Preview\BulkExports\Export\JobList;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property \Twilio\Rest\Preview\BulkExports\Export\JobList $jobs
 * @method \Twilio\Rest\Preview\BulkExports\Export\JobContext jobs(string $jobSid)
 */
class ExportList extends ListResource {
    protected $_jobs = null;

    /**
     * Construct the ExportList
     *
     * @param Version $version Version that contains the resource
     * @return \Twilio\Rest\Preview\BulkExports\ExportList
     */
    public function __construct(Version $version) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array();
    }

    /**
     * Access the jobs
     */
    protected function getJobs() {
        if (!$this->_jobs) {
            $this->_jobs = new JobList($this->version);
        }

        return $this->_jobs;
    }

    /**
     * Constructs a ExportContext
     *
     * @param string $resourceType The resource_type
     * @return \Twilio\Rest\Preview\BulkExports\ExportContext
     */
    public function getContext($resourceType) {
        return new ExportContext($this->version, $resourceType);
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
        return '[Twilio.Preview.BulkExports.ExportList]';
    }
}