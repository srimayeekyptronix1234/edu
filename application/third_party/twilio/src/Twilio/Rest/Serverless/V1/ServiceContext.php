<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Serverless\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Rest\Serverless\V1\Service\AssetList;
use Twilio\Rest\Serverless\V1\Service\BuildList;
use Twilio\Rest\Serverless\V1\Service\EnvironmentList;
use Twilio\Rest\Serverless\V1\Service\FunctionList;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property \Twilio\Rest\Serverless\V1\Service\EnvironmentList $environments
 * @property \Twilio\Rest\Serverless\V1\Service\FunctionList $functions
 * @property \Twilio\Rest\Serverless\V1\Service\AssetList $assets
 * @property \Twilio\Rest\Serverless\V1\Service\BuildList $builds
 * @method \Twilio\Rest\Serverless\V1\Service\EnvironmentContext environments(string $sid)
 * @method \Twilio\Rest\Serverless\V1\Service\FunctionContext functions(string $sid)
 * @method \Twilio\Rest\Serverless\V1\Service\AssetContext assets(string $sid)
 * @method \Twilio\Rest\Serverless\V1\Service\BuildContext builds(string $sid)
 */
class ServiceContext extends InstanceContext {
    protected $_environments = null;
    protected $_functions = null;
    protected $_assets = null;
    protected $_builds = null;

    /**
     * Initialize the ServiceContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $sid The SID of the Service resource to fetch
     * @return \Twilio\Rest\Serverless\V1\ServiceContext
     */
    public function __construct(Version $version, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('sid' => $sid, );

        $this->uri = '/Services/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a ServiceInstance
     *
     * @return ServiceInstance Fetched ServiceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new ServiceInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Deletes the ServiceInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Update the ServiceInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ServiceInstance Updated ServiceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'IncludeCredentials' => Serialize::booleanToString($options['includeCredentials']),
            'FriendlyName' => $options['friendlyName'],
        ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new ServiceInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Access the environments
     *
     * @return \Twilio\Rest\Serverless\V1\Service\EnvironmentList
     */
    protected function getEnvironments() {
        if (!$this->_environments) {
            $this->_environments = new EnvironmentList($this->version, $this->solution['sid']);
        }

        return $this->_environments;
    }

    /**
     * Access the functions
     *
     * @return \Twilio\Rest\Serverless\V1\Service\FunctionList
     */
    protected function getFunctions() {
        if (!$this->_functions) {
            $this->_functions = new FunctionList($this->version, $this->solution['sid']);
        }

        return $this->_functions;
    }

    /**
     * Access the assets
     *
     * @return \Twilio\Rest\Serverless\V1\Service\AssetList
     */
    protected function getAssets() {
        if (!$this->_assets) {
            $this->_assets = new AssetList($this->version, $this->solution['sid']);
        }

        return $this->_assets;
    }

    /**
     * Access the builds
     *
     * @return \Twilio\Rest\Serverless\V1\Service\BuildList
     */
    protected function getBuilds() {
        if (!$this->_builds) {
            $this->_builds = new BuildList($this->version, $this->solution['sid']);
        }

        return $this->_builds;
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
        return '[Twilio.Serverless.V1.ServiceContext ' . implode(' ', $context) . ']';
    }
}