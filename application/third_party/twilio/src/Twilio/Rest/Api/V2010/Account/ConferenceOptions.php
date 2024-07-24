<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Options;
use Twilio\Values;

abstract class ConferenceOptions {
    /**
     * @param string $dateCreatedBefore The `YYYY-MM-DD` value of the resources to
     *                                  read
     * @param string $dateCreated The `YYYY-MM-DD` value of the resources to read
     * @param string $dateCreatedAfter The `YYYY-MM-DD` value of the resources to
     *                                 read
     * @param string $dateUpdatedBefore The `YYYY-MM-DD` value of the resources to
     *                                  read
     * @param string $dateUpdated The `YYYY-MM-DD` value of the resources to read
     * @param string $dateUpdatedAfter The `YYYY-MM-DD` value of the resources to
     *                                 read
     * @param string $friendlyName The string that identifies the Conference
     *                             resources to read
     * @param string $status The status of the resources to read
     * @return ReadConferenceOptions Options builder
     */
    public static function read($dateCreatedBefore = Values::NONE, $dateCreated = Values::NONE, $dateCreatedAfter = Values::NONE, $dateUpdatedBefore = Values::NONE, $dateUpdated = Values::NONE, $dateUpdatedAfter = Values::NONE, $friendlyName = Values::NONE, $status = Values::NONE) {
        return new ReadConferenceOptions($dateCreatedBefore, $dateCreated, $dateCreatedAfter, $dateUpdatedBefore, $dateUpdated, $dateUpdatedAfter, $friendlyName, $status);
    }

    /**
     * @param string $status The new status of the resource
     * @param string $announceUrl The URL we should call to announce something into
     *                            the conference
     * @param string $announceMethod he HTTP method used to call announce_url
     * @return UpdateConferenceOptions Options builder
     */
    public static function update($status = Values::NONE, $announceUrl = Values::NONE, $announceMethod = Values::NONE) {
        return new UpdateConferenceOptions($status, $announceUrl, $announceMethod);
    }
}

class ReadConferenceOptions extends Options {
    /**
     * @param string $dateCreatedBefore The `YYYY-MM-DD` value of the resources to
     *                                  read
     * @param string $dateCreated The `YYYY-MM-DD` value of the resources to read
     * @param string $dateCreatedAfter The `YYYY-MM-DD` value of the resources to
     *                                 read
     * @param string $dateUpdatedBefore The `YYYY-MM-DD` value of the resources to
     *                                  read
     * @param string $dateUpdated The `YYYY-MM-DD` value of the resources to read
     * @param string $dateUpdatedAfter The `YYYY-MM-DD` value of the resources to
     *                                 read
     * @param string $friendlyName The string that identifies the Conference
     *                             resources to read
     * @param string $status The status of the resources to read
     */
    public function __construct($dateCreatedBefore = Values::NONE, $dateCreated = Values::NONE, $dateCreatedAfter = Values::NONE, $dateUpdatedBefore = Values::NONE, $dateUpdated = Values::NONE, $dateUpdatedAfter = Values::NONE, $friendlyName = Values::NONE, $status = Values::NONE) {
        $this->options['dateCreatedBefore'] = $dateCreatedBefore;
        $this->options['dateCreated'] = $dateCreated;
        $this->options['dateCreatedAfter'] = $dateCreatedAfter;
        $this->options['dateUpdatedBefore'] = $dateUpdatedBefore;
        $this->options['dateUpdated'] = $dateUpdated;
        $this->options['dateUpdatedAfter'] = $dateUpdatedAfter;
        $this->options['friendlyName'] = $friendlyName;
        $this->options['status'] = $status;
    }

    /**
     * The `date_created` value, specified as `YYYY-MM-DD`, of the resources to read. To read conferences that started on or before midnight on a date, use `<=YYYY-MM-DD`, and to specify  conferences that started on or after midnight on a date, use `>=YYYY-MM-DD`.
     *
     * @param string $dateCreatedBefore The `YYYY-MM-DD` value of the resources to
     *                                  read
     * @return $this Fluent Builder
     */
    public function setDateCreatedBefore($dateCreatedBefore) {
        $this->options['dateCreatedBefore'] = $dateCreatedBefore;
        return $this;
    }

    /**
     * The `date_created` value, specified as `YYYY-MM-DD`, of the resources to read. To read conferences that started on or before midnight on a date, use `<=YYYY-MM-DD`, and to specify  conferences that started on or after midnight on a date, use `>=YYYY-MM-DD`.
     *
     * @param string $dateCreated The `YYYY-MM-DD` value of the resources to read
     * @return $this Fluent Builder
     */
    public function setDateCreated($dateCreated) {
        $this->options['dateCreated'] = $dateCreated;
        return $this;
    }

    /**
     * The `date_created` value, specified as `YYYY-MM-DD`, of the resources to read. To read conferences that started on or before midnight on a date, use `<=YYYY-MM-DD`, and to specify  conferences that started on or after midnight on a date, use `>=YYYY-MM-DD`.
     *
     * @param string $dateCreatedAfter The `YYYY-MM-DD` value of the resources to
     *                                 read
     * @return $this Fluent Builder
     */
    public function setDateCreatedAfter($dateCreatedAfter) {
        $this->options['dateCreatedAfter'] = $dateCreatedAfter;
        return $this;
    }

    /**
     * The `date_updated` value, specified as `YYYY-MM-DD`, of the resources to read. To read conferences that were last updated on or before midnight on a date, use `<=YYYY-MM-DD`, and to specify conferences that were last updated on or after midnight on a given date, use  `>=YYYY-MM-DD`.
     *
     * @param string $dateUpdatedBefore The `YYYY-MM-DD` value of the resources to
     *                                  read
     * @return $this Fluent Builder
     */
    public function setDateUpdatedBefore($dateUpdatedBefore) {
        $this->options['dateUpdatedBefore'] = $dateUpdatedBefore;
        return $this;
    }

    /**
     * The `date_updated` value, specified as `YYYY-MM-DD`, of the resources to read. To read conferences that were last updated on or before midnight on a date, use `<=YYYY-MM-DD`, and to specify conferences that were last updated on or after midnight on a given date, use  `>=YYYY-MM-DD`.
     *
     * @param string $dateUpdated The `YYYY-MM-DD` value of the resources to read
     * @return $this Fluent Builder
     */
    public function setDateUpdated($dateUpdated) {
        $this->options['dateUpdated'] = $dateUpdated;
        return $this;
    }

    /**
     * The `date_updated` value, specified as `YYYY-MM-DD`, of the resources to read. To read conferences that were last updated on or before midnight on a date, use `<=YYYY-MM-DD`, and to specify conferences that were last updated on or after midnight on a given date, use  `>=YYYY-MM-DD`.
     *
     * @param string $dateUpdatedAfter The `YYYY-MM-DD` value of the resources to
     *                                 read
     * @return $this Fluent Builder
     */
    public function setDateUpdatedAfter($dateUpdatedAfter) {
        $this->options['dateUpdatedAfter'] = $dateUpdatedAfter;
        return $this;
    }

    /**
     * The string that identifies the Conference resources to read.
     *
     * @param string $friendlyName The string that identifies the Conference
     *                             resources to read
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * The status of the resources to read. Can be: `init`, `in-progress`, or `completed`.
     *
     * @param string $status The status of the resources to read
     * @return $this Fluent Builder
     */
    public function setStatus($status) {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Api.V2010.ReadConferenceOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateConferenceOptions extends Options {
    /**
     * @param string $status The new status of the resource
     * @param string $announceUrl The URL we should call to announce something into
     *                            the conference
     * @param string $announceMethod he HTTP method used to call announce_url
     */
    public function __construct($status = Values::NONE, $announceUrl = Values::NONE, $announceMethod = Values::NONE) {
        $this->options['status'] = $status;
        $this->options['announceUrl'] = $announceUrl;
        $this->options['announceMethod'] = $announceMethod;
    }

    /**
     * The new status of the resource. Can be:  Can be: `init`, `in-progress`, or `completed`. Specifying `completed` will end the conference and hang up all participants
     *
     * @param string $status The new status of the resource
     * @return $this Fluent Builder
     */
    public function setStatus($status) {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * The URL we should call to announce something into the conference. The URL can return an MP3, a WAV, or a TwiML document with `<Play>` or `<Say>`.
     *
     * @param string $announceUrl The URL we should call to announce something into
     *                            the conference
     * @return $this Fluent Builder
     */
    public function setAnnounceUrl($announceUrl) {
        $this->options['announceUrl'] = $announceUrl;
        return $this;
    }

    /**
     * The HTTP method used to call `announce_url`. Can be: `GET` or `POST` and the default is `POST`
     *
     * @param string $announceMethod he HTTP method used to call announce_url
     * @return $this Fluent Builder
     */
    public function setAnnounceMethod($announceMethod) {
        $this->options['announceMethod'] = $announceMethod;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Api.V2010.UpdateConferenceOptions ' . implode(' ', $options) . ']';
    }
}