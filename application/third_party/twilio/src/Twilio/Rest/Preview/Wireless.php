<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Preview\Wireless\CommandList;
use Twilio\Rest\Preview\Wireless\RatePlanList;
use Twilio\Rest\Preview\Wireless\SimList;
use Twilio\Version;

/**
 * @property \Twilio\Rest\Preview\Wireless\CommandList $commands
 * @property \Twilio\Rest\Preview\Wireless\RatePlanList $ratePlans
 * @property \Twilio\Rest\Preview\Wireless\SimList $sims
 * @method \Twilio\Rest\Preview\Wireless\CommandContext commands(string $sid)
 * @method \Twilio\Rest\Preview\Wireless\RatePlanContext ratePlans(string $sid)
 * @method \Twilio\Rest\Preview\Wireless\SimContext sims(string $sid)
 */
class Wireless extends Version {
    protected $_commands = null;
    protected $_ratePlans = null;
    protected $_sims = null;

    /**
     * Construct the Wireless version of Preview
     *
     * @param \Twilio\Domain $domain Domain that contains the version
     * @return \Twilio\Rest\Preview\Wireless Wireless version of Preview
     */
    public function __construct(Domain $domain) {
        parent::__construct($domain);
        $this->version = 'wireless';
    }

    /**
     * @return \Twilio\Rest\Preview\Wireless\CommandList
     */
    protected function getCommands() {
        if (!$this->_commands) {
            $this->_commands = new CommandList($this);
        }
        return $this->_commands;
    }

    /**
     * @return \Twilio\Rest\Preview\Wireless\RatePlanList
     */
    protected function getRatePlans() {
        if (!$this->_ratePlans) {
            $this->_ratePlans = new RatePlanList($this);
        }
        return $this->_ratePlans;
    }

    /**
     * @return \Twilio\Rest\Preview\Wireless\SimList
     */
    protected function getSims() {
        if (!$this->_sims) {
            $this->_sims = new SimList($this);
        }
        return $this->_sims;
    }

    /**
     * Magic getter to lazy load root resources
     *
     * @param string $name Resource to return
     * @return \Twilio\ListResource The requested resource
     * @throws TwilioException For unknown resource
     */
    public function __get($name) {
        $method = 'get' . ucfirst($name);
        if (method_exists($this, $method)) {
            return $this->$method();
        }

        throw new TwilioException('Unknown resource ' . $name);
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
        return '[Twilio.Preview.Wireless]';
    }
}