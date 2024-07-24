<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Serverless\V1\Service\Asset;

use Twilio\Page;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class AssetVersionPage extends Page {
    public function __construct($version, $response, $solution) {
        parent::__construct($version, $response);

        // Path Solution
        $this->solution = $solution;
    }

    public function buildInstance(array $payload) {
        return new AssetVersionInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['assetSid']
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Serverless.V1.AssetVersionPage]';
    }
}