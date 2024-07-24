<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Autopilot\V1\Assistant\Task;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class FieldList extends ListResource {
    /**
     * Construct the FieldList
     *
     * @param Version $version Version that contains the resource
     * @param string $assistantSid The SID of the Assistant that is the parent of
     *                             the Task associated with the resource
     * @param string $taskSid The SID of the
     *                        [Task](https://www.twilio.com/docs/autopilot/api/task) resource associated with this Field
     * @return \Twilio\Rest\Autopilot\V1\Assistant\Task\FieldList
     */
    public function __construct(Version $version, $assistantSid, $taskSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('assistantSid' => $assistantSid, 'taskSid' => $taskSid, );

        $this->uri = '/Assistants/' . rawurlencode($assistantSid) . '/Tasks/' . rawurlencode($taskSid) . '/Fields';
    }

    /**
     * Streams FieldInstance records from the API as a generator stream.
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
     * Reads FieldInstance records from the API as a list.
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
     * @return FieldInstance[] Array of results
     */
    public function read($limit = null, $pageSize = null) {
        return iterator_to_array($this->stream($limit, $pageSize), false);
    }

    /**
     * Retrieve a single page of FieldInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of FieldInstance
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

        return new FieldPage($this->version, $response, $this->solution);
    }

    /**
     * Retrieve a specific page of FieldInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return \Twilio\Page Page of FieldInstance
     */
    public function getPage($targetUrl) {
        $response = $this->version->getDomain()->getClient()->request(
            'GET',
            $targetUrl
        );

        return new FieldPage($this->version, $response, $this->solution);
    }

    /**
     * Create a new FieldInstance
     *
     * @param string $fieldType The Field Type of this field
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the new resource
     * @return FieldInstance Newly created FieldInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($fieldType, $uniqueName) {
        $data = Values::of(array('FieldType' => $fieldType, 'UniqueName' => $uniqueName, ));

        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new FieldInstance(
            $this->version,
            $payload,
            $this->solution['assistantSid'],
            $this->solution['taskSid']
        );
    }

    /**
     * Constructs a FieldContext
     *
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Autopilot\V1\Assistant\Task\FieldContext
     */
    public function getContext($sid) {
        return new FieldContext(
            $this->version,
            $this->solution['assistantSid'],
            $this->solution['taskSid'],
            $sid
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Autopilot.V1.FieldList]';
    }
}