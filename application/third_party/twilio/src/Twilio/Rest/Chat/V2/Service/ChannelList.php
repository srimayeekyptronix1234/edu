<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Chat\V2\Service;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

class ChannelList extends ListResource {
    /**
     * Construct the ChannelList
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The SID of the Service that the resource is
     *                           associated with
     * @return \Twilio\Rest\Chat\V2\Service\ChannelList
     */
    public function __construct(Version $version, $serviceSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Channels';
    }

    /**
     * Create a new ChannelInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ChannelInstance Newly created ChannelInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'FriendlyName' => $options['friendlyName'],
            'UniqueName' => $options['uniqueName'],
            'Attributes' => $options['attributes'],
            'Type' => $options['type'],
            'DateCreated' => Serialize::iso8601DateTime($options['dateCreated']),
            'DateUpdated' => Serialize::iso8601DateTime($options['dateUpdated']),
            'CreatedBy' => $options['createdBy'],
        ));

        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new ChannelInstance($this->version, $payload, $this->solution['serviceSid']);
    }

    /**
     * Streams ChannelInstance records from the API as a generator stream.
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
     * Reads ChannelInstance records from the API as a list.
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
     * @return ChannelInstance[] Array of results
     */
    public function read($options = array(), $limit = null, $pageSize = null) {
        return iterator_to_array($this->stream($options, $limit, $pageSize), false);
    }

    /**
     * Retrieve a single page of ChannelInstance records from the API.
     * Request is executed immediately
     *
     * @param array|Options $options Optional Arguments
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of ChannelInstance
     */
    public function page($options = array(), $pageSize = Values::NONE, $pageToken = Values::NONE, $pageNumber = Values::NONE) {
        $options = new Values($options);
        $params = Values::of(array(
            'Type' => Serialize::map($options['type'], function($e) { return $e; }),
            'PageToken' => $pageToken,
            'Page' => $pageNumber,
            'PageSize' => $pageSize,
        ));

        $response = $this->version->page(
            'GET',
            $this->uri,
            $params
        );

        return new ChannelPage($this->version, $response, $this->solution);
    }

    /**
     * Retrieve a specific page of ChannelInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return \Twilio\Page Page of ChannelInstance
     */
    public function getPage($targetUrl) {
        $response = $this->version->getDomain()->getClient()->request(
            'GET',
            $targetUrl
        );

        return new ChannelPage($this->version, $response, $this->solution);
    }

    /**
     * Constructs a ChannelContext
     *
     * @param string $sid The SID of the resource
     * @return \Twilio\Rest\Chat\V2\Service\ChannelContext
     */
    public function getContext($sid) {
        return new ChannelContext($this->version, $this->solution['serviceSid'], $sid);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Chat.V2.ChannelList]';
    }
}