<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Taskrouter\V1\Workspace;

use Twilio\Options;
use Twilio\Values;

abstract class EventOptions {
    /**
     * @param \DateTime $endDate Only include usage that occurred on or before this
     *                           date
     * @param string $eventType The type of Events to read
     * @param int $minutes The period of events to read in minutes
     * @param string $reservationSid The SID of the Reservation with the Events to
     *                               read
     * @param \DateTime $startDate Only include Events from on or after this date
     * @param string $taskQueueSid The SID of the TaskQueue with the Events to read
     * @param string $taskSid The SID of the Task with the Events to read
     * @param string $workerSid The SID of the Worker with the Events to read
     * @param string $workflowSid The SID of the Worker with the Events to read
     * @param string $taskChannel The TaskChannel with the Events to read
     * @param string $sid The unique string that identifies the resource
     * @return ReadEventOptions Options builder
     */
    public static function read($endDate = Values::NONE, $eventType = Values::NONE, $minutes = Values::NONE, $reservationSid = Values::NONE, $startDate = Values::NONE, $taskQueueSid = Values::NONE, $taskSid = Values::NONE, $workerSid = Values::NONE, $workflowSid = Values::NONE, $taskChannel = Values::NONE, $sid = Values::NONE) {
        return new ReadEventOptions($endDate, $eventType, $minutes, $reservationSid, $startDate, $taskQueueSid, $taskSid, $workerSid, $workflowSid, $taskChannel, $sid);
    }
}

class ReadEventOptions extends Options {
    /**
     * @param \DateTime $endDate Only include usage that occurred on or before this
     *                           date
     * @param string $eventType The type of Events to read
     * @param int $minutes The period of events to read in minutes
     * @param string $reservationSid The SID of the Reservation with the Events to
     *                               read
     * @param \DateTime $startDate Only include Events from on or after this date
     * @param string $taskQueueSid The SID of the TaskQueue with the Events to read
     * @param string $taskSid The SID of the Task with the Events to read
     * @param string $workerSid The SID of the Worker with the Events to read
     * @param string $workflowSid The SID of the Worker with the Events to read
     * @param string $taskChannel The TaskChannel with the Events to read
     * @param string $sid The unique string that identifies the resource
     */
    public function __construct($endDate = Values::NONE, $eventType = Values::NONE, $minutes = Values::NONE, $reservationSid = Values::NONE, $startDate = Values::NONE, $taskQueueSid = Values::NONE, $taskSid = Values::NONE, $workerSid = Values::NONE, $workflowSid = Values::NONE, $taskChannel = Values::NONE, $sid = Values::NONE) {
        $this->options['endDate'] = $endDate;
        $this->options['eventType'] = $eventType;
        $this->options['minutes'] = $minutes;
        $this->options['reservationSid'] = $reservationSid;
        $this->options['startDate'] = $startDate;
        $this->options['taskQueueSid'] = $taskQueueSid;
        $this->options['taskSid'] = $taskSid;
        $this->options['workerSid'] = $workerSid;
        $this->options['workflowSid'] = $workflowSid;
        $this->options['taskChannel'] = $taskChannel;
        $this->options['sid'] = $sid;
    }

    /**
     * Only include Events that occurred on or before this date, specified in GMT as an [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) date-time.
     *
     * @param \DateTime $endDate Only include usage that occurred on or before this
     *                           date
     * @return $this Fluent Builder
     */
    public function setEndDate($endDate) {
        $this->options['endDate'] = $endDate;
        return $this;
    }

    /**
     * The type of Events to read. Returns only Events of the type specified.
     *
     * @param string $eventType The type of Events to read
     * @return $this Fluent Builder
     */
    public function setEventType($eventType) {
        $this->options['eventType'] = $eventType;
        return $this;
    }

    /**
     * The period of events to read in minutes. Returns only Events that occurred since this many minutes in the past. The default is `15` minutes.
     *
     * @param int $minutes The period of events to read in minutes
     * @return $this Fluent Builder
     */
    public function setMinutes($minutes) {
        $this->options['minutes'] = $minutes;
        return $this;
    }

    /**
     * The SID of the Reservation with the Events to read. Returns only Events that pertain to the specified Reservation.
     *
     * @param string $reservationSid The SID of the Reservation with the Events to
     *                               read
     * @return $this Fluent Builder
     */
    public function setReservationSid($reservationSid) {
        $this->options['reservationSid'] = $reservationSid;
        return $this;
    }

    /**
     * Only include Events from on or after this date and time, specified in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format.
     *
     * @param \DateTime $startDate Only include Events from on or after this date
     * @return $this Fluent Builder
     */
    public function setStartDate($startDate) {
        $this->options['startDate'] = $startDate;
        return $this;
    }

    /**
     * The SID of the TaskQueue with the Events to read. Returns only the Events that pertain to the specified TaskQueue.
     *
     * @param string $taskQueueSid The SID of the TaskQueue with the Events to read
     * @return $this Fluent Builder
     */
    public function setTaskQueueSid($taskQueueSid) {
        $this->options['taskQueueSid'] = $taskQueueSid;
        return $this;
    }

    /**
     * The SID of the Task with the Events to read. Returns only the Events that pertain to the specified Task.
     *
     * @param string $taskSid The SID of the Task with the Events to read
     * @return $this Fluent Builder
     */
    public function setTaskSid($taskSid) {
        $this->options['taskSid'] = $taskSid;
        return $this;
    }

    /**
     * The SID of the Worker with the Events to read. Returns only the Events that pertain to the specified Worker.
     *
     * @param string $workerSid The SID of the Worker with the Events to read
     * @return $this Fluent Builder
     */
    public function setWorkerSid($workerSid) {
        $this->options['workerSid'] = $workerSid;
        return $this;
    }

    /**
     * The SID of the Workflow with the Events to read. Returns only the Events that pertain to the specified Workflow.
     *
     * @param string $workflowSid The SID of the Worker with the Events to read
     * @return $this Fluent Builder
     */
    public function setWorkflowSid($workflowSid) {
        $this->options['workflowSid'] = $workflowSid;
        return $this;
    }

    /**
     * The TaskChannel with the Events to read. Returns only the Events that pertain to the specified TaskChannel.
     *
     * @param string $taskChannel The TaskChannel with the Events to read
     * @return $this Fluent Builder
     */
    public function setTaskChannel($taskChannel) {
        $this->options['taskChannel'] = $taskChannel;
        return $this;
    }

    /**
     * The SID of the Event resource to read.
     *
     * @param string $sid The unique string that identifies the resource
     * @return $this Fluent Builder
     */
    public function setSid($sid) {
        $this->options['sid'] = $sid;
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
        return '[Twilio.Taskrouter.V1.ReadEventOptions ' . implode(' ', $options) . ']';
    }
}