<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Taskrouter\V1\Workspace\Worker;

use Twilio\Options;
use Twilio\Values;

abstract class WorkersRealTimeStatisticsOptions {
    /**
     * @param string $taskChannel Only calculate real-time statistics on this
     *                            TaskChannel
     * @return FetchWorkersRealTimeStatisticsOptions Options builder
     */
    public static function fetch($taskChannel = Values::NONE) {
        return new FetchWorkersRealTimeStatisticsOptions($taskChannel);
    }
}

class FetchWorkersRealTimeStatisticsOptions extends Options {
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
        return '[Twilio.Taskrouter.V1.FetchWorkersRealTimeStatisticsOptions ' . implode(' ', $options) . ']';
    }
}