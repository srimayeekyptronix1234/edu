<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Taskrouter\V1\Workspace\TaskQueue;

use Twilio\ListResource;
use Twilio\Version;

class TaskQueueRealTimeStatisticsList extends ListResource {
    /**
     * Construct the TaskQueueRealTimeStatisticsList
     *
     * @param Version $version Version that contains the resource
     * @param string $workspaceSid The SID of the Workspace that contains the
     *                             TaskQueue
     * @param string $taskQueueSid The SID of the TaskQueue from which these
     *                             statistics were calculated
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\TaskQueue\TaskQueueRealTimeStatisticsList
     */
    public function __construct(Version $version, $workspaceSid, $taskQueueSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('workspaceSid' => $workspaceSid, 'taskQueueSid' => $taskQueueSid, );
    }

    /**
     * Constructs a TaskQueueRealTimeStatisticsContext
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\TaskQueue\TaskQueueRealTimeStatisticsContext
     */
    public function getContext() {
        return new TaskQueueRealTimeStatisticsContext(
            $this->version,
            $this->solution['workspaceSid'],
            $this->solution['taskQueueSid']
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Taskrouter.V1.TaskQueueRealTimeStatisticsList]';
    }
}