<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Taskrouter\V1\Workspace\TaskQueue;

use Twilio\Options;
use Twilio\Values;

abstract class TaskQueueRealTimeStatisticsOptions {
    /**
     * @param string $taskChannel The TaskChannel for which to fetch statistics
     * @return FetchTaskQueueRealTimeStatisticsOptions Options builder
     */
    public static function fetch($taskChannel = Values::NONE) {
        return new FetchTaskQueueRealTimeStatisticsOptions($taskChannel);
    }
}

class FetchTaskQueueRealTimeStatisticsOptions extends Options {
    /**
     * @param string $taskChannel The TaskChannel for which to fetch statistics
     */
    public function __construct($taskChannel = Values::NONE) {
        $this->options['taskChannel'] = $taskChannel;
    }

    /**
     * The TaskChannel for which to fetch statistics. Can be the TaskChannel's SID or its `unique_name`, such as `voice`, `sms`, or `default`.
     *
     * @param string $taskChannel The TaskChannel for which to fetch statistics
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
        return '[Twilio.Taskrouter.V1.FetchTaskQueueRealTimeStatisticsOptions ' . implode(' ', $options) . ']';
    }
}