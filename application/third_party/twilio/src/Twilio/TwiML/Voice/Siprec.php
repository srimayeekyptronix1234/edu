<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Siprec extends TwiML {
    /**
     * Siprec constructor.
     *
     * @param array $attributes Optional attributes
     */
    public function __construct($attributes = array()) {
        parent::__construct('Siprec', null, $attributes);
    }

    /**
     * Add Parameter child.
     *
     * @param array $attributes Optional attributes
     * @return Parameter Child element.
     */
    public function parameter($attributes = array()) {
        return $this->nest(new Parameter($attributes));
    }

    /**
     * Add Name attribute.
     *
     * @param string $name Friendly name given to SIPREC
     * @return static $this.
     */
    public function setName($name) {
        return $this->setAttribute('name', $name);
    }

    /**
     * Add ConnectorName attribute.
     *
     * @param string $connectorName Unique name for Connector
     * @return static $this.
     */
    public function setConnectorName($connectorName) {
        return $this->setAttribute('connectorName', $connectorName);
    }
}