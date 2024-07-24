<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Authy\V1;

use Twilio\ListResource;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class FormList extends ListResource {
    /**
     * Construct the FormList
     *
     * @param Version $version Version that contains the resource
     * @return \Twilio\Rest\Authy\V1\FormList
     */
    public function __construct(Version $version) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array();
    }

    /**
     * Constructs a FormContext
     *
     * @param string $formType The Type of this Form
     * @return \Twilio\Rest\Authy\V1\FormContext
     */
    public function getContext($formType) {
        return new FormContext($this->version, $formType);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Authy.V1.FormList]';
    }
}