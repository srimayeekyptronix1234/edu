<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Autopilot\V1\Assistant;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class ModelBuildList extends ListResource {
    /**
     * Construct the ModelBuildList
     *
     * @param Version $version Version that contains the resource
     * @param string $assistantSid The SID of the Assistant that is the parent of
     *                             the resource
     * @return \Twilio\Rest\Autopilot\V1\Assistant\ModelBuildList
     */
    public function __construct(Version $version, $assistantSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('assistantSid' => $assistantSid, );

        $this->uri = '/Assistants/' . rawurlencode($assistantSid) . '/ModelBuilds';
    }

    /**
     * Streams ModelBuildInstance records from the API as a generator stream.
     * This operation lazily loads records as efficiently as possible until the
     * limit
     * is reached.
     * The results are returned as a generator, so this operation is memory
     * efficient.
     *
     * @param int $limit Upper limit for the number of records to return. stream()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, stream()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return \Twilio\Stream stream of results
     */
    public function stream($limit = null, $pageSize = null) {
        $limits = $this->version->readLimits($limit, $pageSize);

        $page = $this->page($limits['pageSize']);

        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }

    /**
     * Reads ModelBuildInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     *
     * @param int $limit Upper limit for the number of records to return. read()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, read()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return ModelBuildInstance[] Array of results
     */
    public function read($limit = null, $pageSize = null) {
        return iterator_to_array($this->stream($limit, $pageSize), false);
    }

    /**
     * Retrieve a single page of ModelBuildInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of ModelBuildInstance
     */
    public function page($pageSize = Values::NONE, $pageToken = Values::NONE, $pageNumber = Values::NONE) {
        $params = Values::of(array(
            'PageToken' => $pageToken,
            'Page' => $pageNumber,
            'PageSize' => $pageSize,
        ));

        $response = $this->version->page(
            'GET',
            $this->uri,
            $params
        );

        return new ModelBuildPage($this->version, $response, $this->solution);
    }

    /**
     * Retrieve a specific page of ModelBuildInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return \Twilio\Page Page of ModelBuildInstance
     */
    public function getPage($targetUrl) {
        $response = $this->version->getDomain()->getClient()->request(
            'GET',
            $targetUrl
        );

        return new ModelBuildPage($this->version, $response, $this->solution);
    }

    /**
     * Create a new ModelBuildInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ModelBuildInstance Newly created ModelBuildInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'StatusCallback' => $options['statusCallback'],
            'UniqueName' => $options['uniqueName'],
        ));

        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new ModelBuildInstance($this->version, $payload, $this->solution['assistantSid']);
    }

    /**
     * Constructs a ModelBuildContext
     *
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Autopilot\V1\Assistant\ModelBuildContext
     */
    public function getContext($sid) {
        return new ModelBuildContext($this->version, $this->solution['assistantSid'], $sid);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Autopilot.V1.ModelBuildList]';
    }
}