<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Serverless\V1;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class ServiceOptions {
    /**
     * @param bool $includeCredentials Whether to inject Account credentials into a
     *                                 function invocation context
     * @return CreateServiceOptions Options builder
     */
    public static function create($includeCredentials = Values::NONE) {
        return new CreateServiceOptions($includeCredentials);
    }

    /**
     * @param bool $includeCredentials Whether to inject Account credentials into a
     *                                 function invocation context
     * @param string $friendlyName A string to describe the Service resource
     * @return UpdateServiceOptions Options builder
     */
    public static function update($includeCredentials = Values::NONE, $friendlyName = Values::NONE) {
        return new UpdateServiceOptions($includeCredentials, $friendlyName);
    }
}

class CreateServiceOptions extends Options {
    /**
     * @param bool $includeCredentials Whether to inject Account credentials into a
     *                                 function invocation context
     */
    public function __construct($includeCredentials = Values::NONE) {
        $this->options['includeCredentials'] = $includeCredentials;
    }

    /**
     * Whether to inject Account credentials into a function invocation context. The default value is `false`.
     *
     * @param bool $includeCredentials Whether to inject Account credentials into a
     *                                 function invocation context
     * @return $this Fluent Builder
     */
    public function setIncludeCredentials($includeCredentials) {
        $this->options['includeCredentials'] = $includeCredentials;
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
        return '[Twilio.Serverless.V1.CreateServiceOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateServiceOptions extends Options {
    /**
     * @param bool $includeCredentials Whether to inject Account credentials into a
     *                                 function invocation context
     * @param string $friendlyName A string to describe the Service resource
     */
    public function __construct($includeCredentials = Values::NONE, $friendlyName = Values::NONE) {
        $this->options['includeCredentials'] = $includeCredentials;
        $this->options['friendlyName'] = $friendlyName;
    }

    /**
     * Whether to inject Account credentials into a function invocation context.
     *
     * @param bool $includeCredentials Whether to inject Account credentials into a
     *                                 function invocation context
     * @return $this Fluent Builder
     */
    public function setIncludeCredentials($includeCredentials) {
        $this->options['includeCredentials'] = $includeCredentials;
        return $this;
    }

    /**
     * A descriptive string that you create to describe the Service resource. It can be up to 255 characters long.
     *
     * @param string $friendlyName A string to describe the Service resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
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
        return '[Twilio.Serverless.V1.UpdateServiceOptions ' . implode(' ', $options) . ']';
    }
}