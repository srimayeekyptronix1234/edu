<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\BulkExports\Export;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class JobContext extends InstanceContext {
    /**
     * Initialize the JobContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $jobSid The job_sid
     * @return \Twilio\Rest\Preview\BulkExports\Export\JobContext
     */
    public function __construct(Version $version, $jobSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('jobSid' => $jobSid, );

        $this->uri = '/Exports/Jobs/' . rawurlencode($jobSid) . '';
    }

    /**
     * Fetch a JobInstance
     *
     * @return JobInstance Fetched JobInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new JobInstance($this->version, $payload, $this->solution['jobSid']);
    }

    /**
     * Deletes the JobInstance
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
        return '[Twilio.Preview.BulkExports.JobContext ' . implode(' ', $context) . ']';
    }
}