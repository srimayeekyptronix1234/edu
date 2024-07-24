<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Serverless\V1\Service\Environment;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class VariableOptions {
    /**
     * @param string $key A string by which the Variable resource can be referenced
     * @param string $value A string that contains the actual value of the variable
     * @return UpdateVariableOptions Options builder
     */
    public static function update($key = Values::NONE, $value = Values::NONE) {
        return new UpdateVariableOptions($key, $value);
    }
}

class UpdateVariableOptions extends Options {
    /**
     * @param string $key A string by which the Variable resource can be referenced
     * @param string $value A string that contains the actual value of the variable
     */
    public function __construct($key = Values::NONE, $value = Values::NONE) {
        $this->options['key'] = $key;
        $this->options['value'] = $value;
    }

    /**
     * A string by which the Variable resource can be referenced. Must be less than 128 characters long.
     *
     * @param string $key A string by which the Variable resource can be referenced
     * @return $this Fluent Builder
     */
    public function setKey($key) {
        $this->options['key'] = $key;
        return $this;
    }

    /**
     * A string that contains the actual value of the variable. Must have less than 450 bytes.
     *
     * @param string $value A string that contains the actual value of the variable
     * @return $this Fluent Builder
     */
    public function setValue($value) {
        $this->options['value'] = $value;
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
        return '[Twilio.Serverless.V1.UpdateVariableOptions ' . implode(' ', $options) . ']';
    }
}