<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Enqueue extends TwiML {
    /**
     * Enqueue constructor.
     *
     * @param string $name Friendly name
     * @param array $attributes Optional attributes
     */
    public function __construct($name = null, $attributes = array()) {
        parent::__construct('Enqueue', $name, $attributes);
    }

    /**
     * Add Task child.
     *
     * @param string $body TaskRouter task attributes
     * @param array $attributes Optional attributes
     * @return Task Child element.
     */
    public function task($body, $attributes = array()) {
        return $this->nest(new Task($body, $attributes));
    }

    /**
     * Add Action attribute.
     *
     * @param string $action Action URL
     * @return static $this.
     */
    public function setAction($action) {
        return $this->setAttribute('action', $action);
    }

    /**
     * Add Method attribute.
     *
     * @param string $method Action URL method
     * @return static $this.
     */
    public function setMethod($method) {
        return $this->setAttribute('method', $method);
    }

    /**
     * Add WaitUrl attribute.
     *
     * @param string $waitUrl Wait URL
     * @return static $this.
     */
    public function setWaitUrl($waitUrl) {
        return $this->setAttribute('waitUrl', $waitUrl);
    }

    /**
     * Add WaitUrlMethod attribute.
     *
     * @param string $waitUrlMethod Wait URL method
     * @return static $this.
     */
    public function setWaitUrlMethod($waitUrlMethod) {
        return $this->setAttribute('waitUrlMethod', $waitUrlMethod);
    }

    /**
     * Add WorkflowSid attribute.
     *
     * @param string $workflowSid TaskRouter Workflow SID
     * @return static $this.
     */
    public function setWorkflowSid($workflowSid) {
        return $this->setAttribute('workflowSid', $workflowSid);
    }
}