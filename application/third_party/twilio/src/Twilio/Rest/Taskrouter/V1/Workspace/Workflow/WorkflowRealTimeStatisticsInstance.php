<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Taskrouter\V1\Workspace\Workflow;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $accountSid
 * @property int $longestTaskWaitingAge
 * @property string $longestTaskWaitingSid
 * @property array $tasksByPriority
 * @property array $tasksByStatus
 * @property int $totalTasks
 * @property string $workflowSid
 * @property string $workspaceSid
 * @property string $url
 */
class WorkflowRealTimeStatisticsInstance extends InstanceResource {
    /**
     * Initialize the WorkflowRealTimeStatisticsInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $workspaceSid The SID of the Workspace that contains the
     *                             Workflow.
     * @param string $workflowSid Returns the list of Tasks that are being
     *                            controlled by the Workflow with the specified SID
     *                            value
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\Workflow\WorkflowRealTimeStatisticsInstance
     */
    public function __construct(Version $version, array $payload, $workspaceSid, $workflowSid) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'longestTaskWaitingAge' => Values::array_get($payload, 'longest_task_waiting_age'),
            'longestTaskWaitingSid' => Values::array_get($payload, 'longest_task_waiting_sid'),
            'tasksByPriority' => Values::array_get($payload, 'tasks_by_priority'),
            'tasksByStatus' => Values::array_get($payload, 'tasks_by_status'),
            'totalTasks' => Values::array_get($payload, 'total_tasks'),
            'workflowSid' => Values::array_get($payload, 'workflow_sid'),
            'workspaceSid' => Values::array_get($payload, 'workspace_sid'),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array('workspaceSid' => $workspaceSid, 'workflowSid' => $workflowSid, );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\Workflow\WorkflowRealTimeStatisticsContext Context for this
     *                                                                                         WorkflowRealTimeStatisticsInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new WorkflowRealTimeStatisticsContext(
                $this->version,
                $this->solution['workspaceSid'],
                $this->solution['workflowSid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a WorkflowRealTimeStatisticsInstance
     *
     * @param array|Options $options Optional Arguments
     * @return WorkflowRealTimeStatisticsInstance Fetched
     *                                            WorkflowRealTimeStatisticsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch($options = array()) {
        return $this->proxy()->fetch($options);
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
        return '[Twilio.Taskrouter.V1.WorkflowRealTimeStatisticsInstance ' . implode(' ', $context) . ']';
    }
}