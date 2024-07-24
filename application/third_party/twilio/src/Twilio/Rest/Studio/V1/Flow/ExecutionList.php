<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Studio\V1\Flow;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

class ExecutionList extends ListResource {
    /**
     * Construct the ExecutionList
     *
     * @param Version $version Version that contains the resource
     * @param string $flowSid The SID of the Flow
     * @return \Twilio\Rest\Studio\V1\Flow\ExecutionList
     */
    public function __construct(Version $version, $flowSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('flowSid' => $flowSid, );

        $this->uri = '/Flows/' . rawurlencode($flowSid) . '/Executions';
    }

    /**
     * Streams ExecutionInstance records from the API as a generator stream.
     * This operation lazily loads records as efficiently as possible until the
     * limit
     * is reached.
     * The results are returned as a generator, so this operation is memory
     * efficient.
     *
     * @param array|Options $options Optional Arguments
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
    public function stream($options = array(), $limit = null, $pageSize = null) {
        $limits = $this->version->readLimits($limit, $pageSize);

        $page = $this->page($options, $limits['pageSize']);

        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }

    /**
     * Reads ExecutionInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     *
     * @param array|Options $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. read()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, read()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return ExecutionInstance[] Array of results
     */
    public function read($options = array(), $limit = null, $pageSize = null) {
        return iterator_to_array($this->stream($options, $limit, $pageSize), false);
    }

    /**
     * Retrieve a single page of ExecutionInstance records from the API.
     * Request is executed immediately
     *
     * @param array|Options $options Optional Arguments
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of ExecutionInstance
     */
    public function page($options = array(), $pageSize = Values::NONE, $pageToken = Values::NONE, $pageNumber = Values::NONE) {
        $options = new Values($options);
        $params = Values::of(array(
            'DateCreatedFrom' => Serialize::iso8601DateTime($options['dateCreatedFrom']),
            'DateCreatedTo' => Serialize::iso8601DateTime($options['dateCreatedTo']),
            'PageToken' => $pageToken,
            'Page' => $pageNumber,
            'PageSize' => $pageSize,
        ));

        $response = $this->version->page(
            'GET',
            $this->uri,
            $params
        );

        return new ExecutionPage($this->version, $response, $this->solution);
    }

    /**
     * Retrieve a specific page of ExecutionInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return \Twilio\Page Page of ExecutionInstance
     */
    public function getPage($targetUrl) {
        $response = $this->version->getDomain()->getClient()->request(
            'GET',
            $targetUrl
        );

        return new ExecutionPage($this->version, $response, $this->solution);
    }

    /**
     * Create a new ExecutionInstance
     *
     * @param string $to The Contact phone number to start a Studio Flow Execution
     * @param string $from The Twilio phone number to send messages or initiate
     *                     calls from during the Flow Execution
     * @param array|Options $options Optional Arguments
     * @return ExecutionInstance Newly created ExecutionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($to, $from, $options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'To' => $to,
            'From' => $from,
            'Parameters' => Serialize::jsonObject($options['parameters']),
        ));

        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new ExecutionInstance($this->version, $payload, $this->solution['flowSid']);
    }

    /**
     * Constructs a ExecutionContext
     *
     * @param string $sid The SID of the Execution resource to fetch
     * @return \Twilio\Rest\Studio\V1\Flow\ExecutionContext
     */
    public function getContext($sid) {
        return new ExecutionContext($this->version, $this->solution['flowSid'], $sid);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Studio.V1.ExecutionList]';
    }
}