<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\DeployedDevices\Fleet;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class DeploymentOptions {
    /**
     * @param string $friendlyName A human readable description for this Deployment.
     * @param string $syncServiceSid The unique identifier of the Sync service
     *                               instance.
     * @return CreateDeploymentOptions Options builder
     */
    public static function create($friendlyName = Values::NONE, $syncServiceSid = Values::NONE) {
        return new CreateDeploymentOptions($friendlyName, $syncServiceSid);
    }

    /**
     * @param string $friendlyName A human readable description for this Deployment.
     * @param string $syncServiceSid The unique identifier of the Sync service
     *                               instance.
     * @return UpdateDeploymentOptions Options builder
     */
    public static function update($friendlyName = Values::NONE, $syncServiceSid = Values::NONE) {
        return new UpdateDeploymentOptions($friendlyName, $syncServiceSid);
    }
}

class CreateDeploymentOptions extends Options {
    /**
     * @param string $friendlyName A human readable description for this Deployment.
     * @param string $syncServiceSid The unique identifier of the Sync service
     *                               instance.
     */
    public function __construct($friendlyName = Values::NONE, $syncServiceSid = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['syncServiceSid'] = $syncServiceSid;
    }

    /**
     * Provides a human readable descriptive text for this Deployment, up to 256 characters long.
     *
     * @param string $friendlyName A human readable description for this Deployment.
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * Provides the unique string identifier of the Twilio Sync service instance that will be linked to and accessible by this Deployment.
     *
     * @param string $syncServiceSid The unique identifier of the Sync service
     *                               instance.
     * @return $this Fluent Builder
     */
    public function setSyncServiceSid($syncServiceSid) {
        $this->options['syncServiceSid'] = $syncServiceSid;
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
        return '[Twilio.Preview.DeployedDevices.CreateDeploymentOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateDeploymentOptions extends Options {
    /**
     * @param string $friendlyName A human readable description for this Deployment.
     * @param string $syncServiceSid The unique identifier of the Sync service
     *                               instance.
     */
    public function __construct($friendlyName = Values::NONE, $syncServiceSid = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['syncServiceSid'] = $syncServiceSid;
    }

    /**
     * Provides a human readable descriptive text for this Deployment, up to 64 characters long
     *
     * @param string $friendlyName A human readable description for this Deployment.
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * Provides the unique string identifier of the Twilio Sync service instance that will be linked to and accessible by this Deployment.
     *
     * @param string $syncServiceSid The unique identifier of the Sync service
     *                               instance.
     * @return $this Fluent Builder
     */
    public function setSyncServiceSid($syncServiceSid) {
        $this->options['syncServiceSid'] = $syncServiceSid;
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
        return '[Twilio.Preview.DeployedDevices.UpdateDeploymentOptions ' . implode(' ', $options) . ']';
    }
}