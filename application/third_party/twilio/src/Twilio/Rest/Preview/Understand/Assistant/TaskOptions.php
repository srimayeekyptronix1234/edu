<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\Understand\Assistant;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class TaskOptions {
    /**
     * @param string $friendlyName A user-provided string that identifies this
     *                             resource. It is non-unique and can up to 255
     *                             characters long.
     * @param array $actions A user-provided JSON object encoded as a string to
     *                       specify the actions for this task. It is optional and
     *                       non-unique.
     * @param string $actionsUrl User-provided HTTP endpoint where from the
     *                           assistant fetches actions
     * @return CreateTaskOptions Options builder
     */
    public static function create($friendlyName = Values::NONE, $actions = Values::NONE, $actionsUrl = Values::NONE) {
        return new CreateTaskOptions($friendlyName, $actions, $actionsUrl);
    }

    /**
     * @param string $friendlyName A user-provided string that identifies this
     *                             resource. It is non-unique and can up to 255
     *                             characters long.
     * @param string $uniqueName A user-provided string that uniquely identifies
     *                           this resource as an alternative to the sid. Unique
     *                           up to 64 characters long.
     * @param array $actions A user-provided JSON object encoded as a string to
     *                       specify the actions for this task. It is optional and
     *                       non-unique.
     * @param string $actionsUrl User-provided HTTP endpoint where from the
     *                           assistant fetches actions
     * @return UpdateTaskOptions Options builder
     */
    public static function update($friendlyName = Values::NONE, $uniqueName = Values::NONE, $actions = Values::NONE, $actionsUrl = Values::NONE) {
        return new UpdateTaskOptions($friendlyName, $uniqueName, $actions, $actionsUrl);
    }
}

class CreateTaskOptions extends Options {
    /**
     * @param string $friendlyName A user-provided string that identifies this
     *                             resource. It is non-unique and can up to 255
     *                             characters long.
     * @param array $actions A user-provided JSON object encoded as a string to
     *                       specify the actions for this task. It is optional and
     *                       non-unique.
     * @param string $actionsUrl User-provided HTTP endpoint where from the
     *                           assistant fetches actions
     */
    public function __construct($friendlyName = Values::NONE, $actions = Values::NONE, $actionsUrl = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['actions'] = $actions;
        $this->options['actionsUrl'] = $actionsUrl;
    }

    /**
     * A user-provided string that identifies this resource. It is non-unique and can up to 255 characters long.
     *
     * @param string $friendlyName A user-provided string that identifies this
     *                             resource. It is non-unique and can up to 255
     *                             characters long.
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * A user-provided JSON object encoded as a string to specify the actions for this task. It is optional and non-unique.
     *
     * @param array $actions A user-provided JSON object encoded as a string to
     *                       specify the actions for this task. It is optional and
     *                       non-unique.
     * @return $this Fluent Builder
     */
    public function setActions($actions) {
        $this->options['actions'] = $actions;
        return $this;
    }

    /**
     * User-provided HTTP endpoint where from the assistant fetches actions
     *
     * @param string $actionsUrl User-provided HTTP endpoint where from the
     *                           assistant fetches actions
     * @return $this Fluent Builder
     */
    public function setActionsUrl($actionsUrl) {
        $this->options['actionsUrl'] = $actionsUrl;
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
        return '[Twilio.Preview.Understand.CreateTaskOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateTaskOptions extends Options {
    /**
     * @param string $friendlyName A user-provided string that identifies this
     *                             resource. It is non-unique and can up to 255
     *                             characters long.
     * @param string $uniqueName A user-provided string that uniquely identifies
     *                           this resource as an alternative to the sid. Unique
     *                           up to 64 characters long.
     * @param array $actions A user-provided JSON object encoded as a string to
     *                       specify the actions for this task. It is optional and
     *                       non-unique.
     * @param string $actionsUrl User-provided HTTP endpoint where from the
     *                           assistant fetches actions
     */
    public function __construct($friendlyName = Values::NONE, $uniqueName = Values::NONE, $actions = Values::NONE, $actionsUrl = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['uniqueName'] = $uniqueName;
        $this->options['actions'] = $actions;
        $this->options['actionsUrl'] = $actionsUrl;
    }

    /**
     * A user-provided string that identifies this resource. It is non-unique and can up to 255 characters long.
     *
     * @param string $friendlyName A user-provided string that identifies this
     *                             resource. It is non-unique and can up to 255
     *                             characters long.
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * A user-provided string that uniquely identifies this resource as an alternative to the sid. Unique up to 64 characters long.
     *
     * @param string $uniqueName A user-provided string that uniquely identifies
     *                           this resource as an alternative to the sid. Unique
     *                           up to 64 characters long.
     * @return $this Fluent Builder
     */
    public function setUniqueName($uniqueName) {
        $this->options['uniqueName'] = $uniqueName;
        return $this;
    }

    /**
     * A user-provided JSON object encoded as a string to specify the actions for this task. It is optional and non-unique.
     *
     * @param array $actions A user-provided JSON object encoded as a string to
     *                       specify the actions for this task. It is optional and
     *                       non-unique.
     * @return $this Fluent Builder
     */
    public function setActions($actions) {
        $this->options['actions'] = $actions;
        return $this;
    }

    /**
     * User-provided HTTP endpoint where from the assistant fetches actions
     *
     * @param string $actionsUrl User-provided HTTP endpoint where from the
     *                           assistant fetches actions
     * @return $this Fluent Builder
     */
    public function setActionsUrl($actionsUrl) {
        $this->options['actionsUrl'] = $actionsUrl;
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
        return '[Twilio.Preview.Understand.UpdateTaskOptions ' . implode(' ', $options) . ']';
    }
}