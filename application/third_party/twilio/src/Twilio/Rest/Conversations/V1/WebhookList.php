<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Conversations\V1;

use Twilio\ListResource;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class WebhookList extends ListResource {
    /**
     * Construct the WebhookList
     *
     * @param Version $version Version that contains the resource
     * @return \Twilio\Rest\Conversations\V1\WebhookList
     */
    public function __construct(Version $version) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array();
    }

    /**
     * Constructs a WebhookContext
     *
     * @return \Twilio\Rest\Conversations\V1\WebhookContext
     */
    public function getContext() {
        return new WebhookContext($this->version);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Conversations.V1.WebhookList]';
    }
}