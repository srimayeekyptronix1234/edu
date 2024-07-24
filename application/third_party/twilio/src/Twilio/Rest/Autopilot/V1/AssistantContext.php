<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Autopilot\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Rest\Autopilot\V1\Assistant\DefaultsList;
use Twilio\Rest\Autopilot\V1\Assistant\DialogueList;
use Twilio\Rest\Autopilot\V1\Assistant\FieldTypeList;
use Twilio\Rest\Autopilot\V1\Assistant\ModelBuildList;
use Twilio\Rest\Autopilot\V1\Assistant\QueryList;
use Twilio\Rest\Autopilot\V1\Assistant\StyleSheetList;
use Twilio\Rest\Autopilot\V1\Assistant\TaskList;
use Twilio\Rest\Autopilot\V1\Assistant\WebhookList;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property \Twilio\Rest\Autopilot\V1\Assistant\FieldTypeList $fieldTypes
 * @property \Twilio\Rest\Autopilot\V1\Assistant\TaskList $tasks
 * @property \Twilio\Rest\Autopilot\V1\Assistant\ModelBuildList $modelBuilds
 * @property \Twilio\Rest\Autopilot\V1\Assistant\QueryList $queries
 * @property \Twilio\Rest\Autopilot\V1\Assistant\StyleSheetList $styleSheet
 * @property \Twilio\Rest\Autopilot\V1\Assistant\DefaultsList $defaults
 * @property \Twilio\Rest\Autopilot\V1\Assistant\DialogueList $dialogues
 * @property \Twilio\Rest\Autopilot\V1\Assistant\WebhookList $webhooks
 * @method \Twilio\Rest\Autopilot\V1\Assistant\FieldTypeContext fieldTypes(string $sid)
 * @method \Twilio\Rest\Autopilot\V1\Assistant\TaskContext tasks(string $sid)
 * @method \Twilio\Rest\Autopilot\V1\Assistant\ModelBuildContext modelBuilds(string $sid)
 * @method \Twilio\Rest\Autopilot\V1\Assistant\QueryContext queries(string $sid)
 * @method \Twilio\Rest\Autopilot\V1\Assistant\StyleSheetContext styleSheet()
 * @method \Twilio\Rest\Autopilot\V1\Assistant\DefaultsContext defaults()
 * @method \Twilio\Rest\Autopilot\V1\Assistant\DialogueContext dialogues(string $sid)
 * @method \Twilio\Rest\Autopilot\V1\Assistant\WebhookContext webhooks(string $sid)
 */
class AssistantContext extends InstanceContext {
    protected $_fieldTypes = null;
    protected $_tasks = null;
    protected $_modelBuilds = null;
    protected $_queries = null;
    protected $_styleSheet = null;
    protected $_defaults = null;
    protected $_dialogues = null;
    protected $_webhooks = null;

    /**
     * Initialize the AssistantContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Autopilot\V1\AssistantContext
     */
    public function __construct(Version $version, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('sid' => $sid, );

        $this->uri = '/Assistants/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a AssistantInstance
     *
     * @return AssistantInstance Fetched AssistantInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new AssistantInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Update the AssistantInstance
     *
     * @param array|Options $options Optional Arguments
     * @return AssistantInstance Updated AssistantInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'FriendlyName' => $options['friendlyName'],
            'LogQueries' => Serialize::booleanToString($options['logQueries']),
            'UniqueName' => $options['uniqueName'],
            'CallbackUrl' => $options['callbackUrl'],
            'CallbackEvents' => $options['callbackEvents'],
            'StyleSheet' => Serialize::jsonObject($options['styleSheet']),
            'Defaults' => Serialize::jsonObject($options['defaults']),
            'DevelopmentStage' => $options['developmentStage'],
        ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new AssistantInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Deletes the AssistantInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Access the fieldTypes
     *
     * @return \Twilio\Rest\Autopilot\V1\Assistant\FieldTypeList
     */
    protected function getFieldTypes() {
        if (!$this->_fieldTypes) {
            $this->_fieldTypes = new FieldTypeList($this->version, $this->solution['sid']);
        }

        return $this->_fieldTypes;
    }

    /**
     * Access the tasks
     *
     * @return \Twilio\Rest\Autopilot\V1\Assistant\TaskList
     */
    protected function getTasks() {
        if (!$this->_tasks) {
            $this->_tasks = new TaskList($this->version, $this->solution['sid']);
        }

        return $this->_tasks;
    }

    /**
     * Access the modelBuilds
     *
     * @return \Twilio\Rest\Autopilot\V1\Assistant\ModelBuildList
     */
    protected function getModelBuilds() {
        if (!$this->_modelBuilds) {
            $this->_modelBuilds = new ModelBuildList($this->version, $this->solution['sid']);
        }

        return $this->_modelBuilds;
    }

    /**
     * Access the queries
     *
     * @return \Twilio\Rest\Autopilot\V1\Assistant\QueryList
     */
    protected function getQueries() {
        if (!$this->_queries) {
            $this->_queries = new QueryList($this->version, $this->solution['sid']);
        }

        return $this->_queries;
    }

    /**
     * Access the styleSheet
     *
     * @return \Twilio\Rest\Autopilot\V1\Assistant\StyleSheetList
     */
    protected function getStyleSheet() {
        if (!$this->_styleSheet) {
            $this->_styleSheet = new StyleSheetList($this->version, $this->solution['sid']);
        }

        return $this->_styleSheet;
    }

    /**
     * Access the defaults
     *
     * @return \Twilio\Rest\Autopilot\V1\Assistant\DefaultsList
     */
    protected function getDefaults() {
        if (!$this->_defaults) {
            $this->_defaults = new DefaultsList($this->version, $this->solution['sid']);
        }

        return $this->_defaults;
    }

    /**
     * Access the dialogues
     *
     * @return \Twilio\Rest\Autopilot\V1\Assistant\DialogueList
     */
    protected function getDialogues() {
        if (!$this->_dialogues) {
            $this->_dialogues = new DialogueList($this->version, $this->solution['sid']);
        }

        return $this->_dialogues;
    }

    /**
     * Access the webhooks
     *
     * @return \Twilio\Rest\Autopilot\V1\Assistant\WebhookList
     */
    protected function getWebhooks() {
        if (!$this->_webhooks) {
            $this->_webhooks = new WebhookList($this->version, $this->solution['sid']);
        }

        return $this->_webhooks;
    }

    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return \Twilio\ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get($name) {
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown subresource ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return \Twilio\InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call($name, $arguments) {
        $property = $this->$name;
        if (method_exists($property, 'getContext')) {
            return call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
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
        return '[Twilio.Autopilot.V1.AssistantContext ' . implode(' ', $context) . ']';
    }
}