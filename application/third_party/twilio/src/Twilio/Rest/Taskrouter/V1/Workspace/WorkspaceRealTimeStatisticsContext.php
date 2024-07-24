<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Taskrouter\V1\Workspace;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

class WorkspaceRealTimeStatisticsContext extends InstanceContext {
    /**
     * Initialize the WorkspaceRealTimeStatisticsContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $workspaceSid The SID of the Workspace to fetch
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceRealTimeStatisticsContext
     */
    public function __construct(Version $version, $workspaceSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('workspaceSid' => $workspaceSid, );

        $this->uri = '/Workspaces/' . rawurlencode($workspaceSid) . '/RealTimeStatistics';
    }

    /**
     * Fetch a WorkspaceRealTimeStatisticsInstance
     *
     * @param array|Options $options Optional Arguments
     * @return WorkspaceRealTimeStatisticsInstance Fetched
     *                                             WorkspaceRealTimeStatisticsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch($options = array()) {
        $options = new Values($options);

        $params = Values::of(array('TaskChannel' => $options['taskChannel'], ));

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new WorkspaceRealTimeStatisticsInstance(
            $this->version,
            $payload,
            $this->solution['workspaceSid']
        );
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
        return '[Twilio.Taskrouter.V1.WorkspaceRealTimeStatisticsContext ' . implode(' ', $context) . ']';
    }
}