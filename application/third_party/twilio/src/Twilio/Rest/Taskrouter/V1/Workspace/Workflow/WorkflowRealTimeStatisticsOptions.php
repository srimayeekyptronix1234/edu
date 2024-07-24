<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Taskrouter\V1\Workspace\Workflow;

use Twilio\Options;
use Twilio\Values;

abstract class WorkflowRealTimeStatisticsOptions {
    /**
     * @param string $taskChannel Only calculate real-time statistics on this
     *                            TaskChannel
     * @return FetchWorkflowRealTimeStatisticsOptions Options builder
     */
    public static function fetch($taskChannel = Values::NONE) {
        return new FetchWorkflowRealTimeStatisticsOptions($taskChannel);
    }
}

class FetchWorkflowRealTimeStatisticsOptions extends Options {
    /**
     * @param string $taskChannel Only calculate real-time statistics on this
     *                            TaskChannel
     */
    public function __construct($taskChannel = Values::NONE) {
        $this->options['taskChannel'] = $taskChannel;
    }

    /**
     * Only calculate real-time statistics on this TaskChannel. Can be the TaskChannel's SID or its `unique_name`, such as `voice`, `sms`, or `default`.
     *
     * @param string $taskChannel Only calculate real-time statistics on this
     *                            TaskChannel
     * @return $this Fluent Builder
     */
    public function setTaskChannel($taskChannel) {
        $this->options['taskChannel'] = $taskChannel;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Taskrouter.V1.FetchWorkflowRealTimeStatisticsOptions ' . implode(' ', $options) . ']';
    }
}