<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Studio\V1\Flow\Engagement\Step;

use Twilio\ListResource;
use Twilio\Version;

class StepContextList extends ListResource {
    /**
     * Construct the StepContextList
     *
     * @param Version $version Version that contains the resource
     * @param string $flowSid The SID of the Flow
     * @param string $engagementSid The SID of the Engagement
     * @param string $stepSid Step SID
     * @return \Twilio\Rest\Studio\V1\Flow\Engagement\Step\StepContextList
     */
    public function __construct(Version $version, $flowSid, $engagementSid, $stepSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array(
            'flowSid' => $flowSid,
            'engagementSid' => $engagementSid,
            'stepSid' => $stepSid,
        );
    }

    /**
     * Constructs a StepContextContext
     *
     * @return \Twilio\Rest\Studio\V1\Flow\Engagement\Step\StepContextContext
     */
    public function getContext() {
        return new StepContextContext(
            $this->version,
            $this->solution['flowSid'],
            $this->solution['engagementSid'],
            $this->solution['stepSid']
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Studio.V1.StepContextList]';
    }
}