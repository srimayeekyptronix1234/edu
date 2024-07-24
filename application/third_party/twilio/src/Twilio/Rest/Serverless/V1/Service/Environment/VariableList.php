<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Serverless\V1\Service\Environment;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class VariableList extends ListResource {
    /**
     * Construct the VariableList
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The SID of the Service that the Variable resource
     *                           is associated with
     * @param string $environmentSid The SID of the environment in which the
     *                               variable exists
     * @return \Twilio\Rest\Serverless\V1\Service\Environment\VariableList
     */
    public function __construct(Version $version, $serviceSid, $environmentSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, 'environmentSid' => $environmentSid, );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Environments/' . rawurlencode($environmentSid) . '/Variables';
    }

    /**
     * Streams VariableInstance records from the API as a generator stream.
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
     * Reads VariableInstance records from the API as a list.
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
     * @return VariableInstance[] Array of results
     */
    public function read($limit = null, $pageSize = null) {
        return iterator_to_array($this->stream($limit, $pageSize), false);
    }

    /**
     * Retrieve a single page of VariableInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of VariableInstance
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

        return new VariablePage($this->version, $response, $this->solution);
    }

    /**
     * Retrieve a specific page of VariableInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return \Twilio\Page Page of VariableInstance
     */
    public function getPage($targetUrl) {
        $response = $this->version->getDomain()->getClient()->request(
            'GET',
            $targetUrl
        );

        return new VariablePage($this->version, $response, $this->solution);
    }

    /**
     * Create a new VariableInstance
     *
     * @param string $key A string by which the Variable resource can be referenced
     * @param string $value A string that contains the actual value of the variable
     * @return VariableInstance Newly created VariableInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($key, $value) {
        $data = Values::of(array('Key' => $key, 'Value' => $value, ));

        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new VariableInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['environmentSid']
        );
    }

    /**
     * Constructs a VariableContext
     *
     * @param string $sid The SID of the Variable resource to fetch
     * @return \Twilio\Rest\Serverless\V1\Service\Environment\VariableContext
     */
    public function getContext($sid) {
        return new VariableContext(
            $this->version,
            $this->solution['serviceSid'],
            $this->solution['environmentSid'],
            $sid
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Serverless.V1.VariableList]';
    }
}