<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\BulkExports\Export;

use Twilio\ListResource;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class JobList extends ListResource {
    /**
     * Construct the JobList
     *
     * @param Version $version Version that contains the resource
     * @return \Twilio\Rest\Preview\BulkExports\Export\JobList
     */
    public function __construct(Version $version) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array();
    }

    /**
     * Constructs a JobContext
     *
     * @param string $jobSid The job_sid
     * @return \Twilio\Rest\Preview\BulkExports\Export\JobContext
     */
    public function getContext($jobSid) {
        return new JobContext($this->version, $jobSid);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Preview.BulkExports.JobList]';
    }
}