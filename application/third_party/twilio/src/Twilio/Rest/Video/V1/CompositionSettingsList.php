<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Video\V1;

use Twilio\ListResource;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class CompositionSettingsList extends ListResource {
    /**
     * Construct the CompositionSettingsList
     *
     * @param Version $version Version that contains the resource
     * @return \Twilio\Rest\Video\V1\CompositionSettingsList
     */
    public function __construct(Version $version) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array();
    }

    /**
     * Constructs a CompositionSettingsContext
     *
     * @return \Twilio\Rest\Video\V1\CompositionSettingsContext
     */
    public function getContext() {
        return new CompositionSettingsContext($this->version);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Video.V1.CompositionSettingsList]';
    }
}