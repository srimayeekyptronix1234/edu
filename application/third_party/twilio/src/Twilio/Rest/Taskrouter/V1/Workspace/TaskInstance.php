<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Taskrouter\V1\Workspace;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $accountSid
 * @property int $age
 * @property string $assignmentStatus
 * @property string $attributes
 * @property string $addons
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property int $priority
 * @property string $reason
 * @property string $sid
 * @property string $taskQueueSid
 * @property string $taskQueueFriendlyName
 * @property string $taskChannelSid
 * @property string $taskChannelUniqueName
 * @property int $timeout
 * @property string $workflowSid
 * @property string $workflowFriendlyName
 * @property string $workspaceSid
 * @property string $url
 * @property array $links
 */
class TaskInstance extends InstanceResource {
    protected $_reservations = null;

    /**
     * Initialize the TaskInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $workspaceSid The SID of the Workspace that contains the Task
     * @param string $sid The SID of the resource to fetch
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\TaskInstance
     */
    public function __construct(Version $version, array $payload, $workspaceSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'age' => Values::array_get($payload, 'age'),
            'assignmentStatus' => Values::array_get($payload, 'assignment_status'),
            'attributes' => Values::array_get($payload, 'attributes'),
            'addons' => Values::array_get($payload, 'addons'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'priority' => Values::array_get($payload, 'priority'),
            'reason' => Values::array_get($payload, 'reason'),
            'sid' => Values::array_get($payload, 'sid'),
            'taskQueueSid' => Values::array_get($payload, 'task_queue_sid'),
            'taskQueueFriendlyName' => Values::array_get($payload, 'task_queue_friendly_name'),
            'taskChannelSid' => Values::array_get($payload, 'task_channel_sid'),
            'taskChannelUniqueName' => Values::array_get($payload, 'task_channel_unique_name'),
            'timeout' => Values::array_get($payload, 'timeout'),
            'workflowSid' => Values::array_get($payload, 'workflow_sid'),
            'workflowFriendlyName' => Values::array_get($payload, 'workflow_friendly_name'),
            'workspaceSid' => Values::array_get($payload, 'workspace_sid'),
            'url' => Values::array_get($payload, 'url'),
            'links' => Values::array_get($payload, 'links'),
        );

        $this->solution = array('workspaceSid' => $workspaceSid, 'sid' => $sid ?: $this->properties['sid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\TaskContext Context for this
     *                                                          TaskInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new TaskContext(
                $this->version,
                $this->solution['workspaceSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a TaskInstance
     *
     * @return TaskInstance Fetched TaskInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Update the TaskInstance
     *
     * @param array|Options $options Optional Arguments
     * @return TaskInstance Updated TaskInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        return $this->proxy()->update($options);
    }

    /**
     * Deletes the TaskInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Access the reservations
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\Task\ReservationList
     */
    protected function getReservations() {
        return $this->proxy()->reservations;
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
        return '[Twilio.Taskrouter.V1.TaskInstance ' . implode(' ', $context) . ']';
    }
}