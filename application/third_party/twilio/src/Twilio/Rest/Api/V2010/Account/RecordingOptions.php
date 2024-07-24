<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Options;
use Twilio\Values;

abstract class RecordingOptions {
    /**
     * @param string $dateCreatedBefore Only include recordings that were created
     *                                  on this date
     * @param string $dateCreated Only include recordings that were created on this
     *                            date
     * @param string $dateCreatedAfter Only include recordings that were created on
     *                                 this date
     * @param string $callSid The Call SID of the resources to read
     * @param string $conferenceSid Read by unique Conference SID for the recording
     * @return ReadRecordingOptions Options builder
     */
    public static function read($dateCreatedBefore = Values::NONE, $dateCreated = Values::NONE, $dateCreatedAfter = Values::NONE, $callSid = Values::NONE, $conferenceSid = Values::NONE) {
        return new ReadRecordingOptions($dateCreatedBefore, $dateCreated, $dateCreatedAfter, $callSid, $conferenceSid);
    }
}

class ReadRecordingOptions extends Options {
    /**
     * @param string $dateCreatedBefore Only include recordings that were created
     *                                  on this date
     * @param string $dateCreated Only include recordings that were created on this
     *                            date
     * @param string $dateCreatedAfter Only include recordings that were created on
     *                                 this date
     * @param string $callSid The Call SID of the resources to read
     * @param string $conferenceSid Read by unique Conference SID for the recording
     */
    public function __construct($dateCreatedBefore = Values::NONE, $dateCreated = Values::NONE, $dateCreatedAfter = Values::NONE, $callSid = Values::NONE, $conferenceSid = Values::NONE) {
        $this->options['dateCreatedBefore'] = $dateCreatedBefore;
        $this->options['dateCreated'] = $dateCreated;
        $this->options['dateCreatedAfter'] = $dateCreatedAfter;
        $this->options['callSid'] = $callSid;
        $this->options['conferenceSid'] = $conferenceSid;
    }

    /**
     * Only include recordings that were created on this date. Specify a date as `YYYY-MM-DD` in GMT, for example: `2009-07-06`, to read recordings that were created on this date. You can also specify an inequality, such as `DateCreated<=YYYY-MM-DD`, to read recordings that were created on or before midnight of this date, and `DateCreated>=YYYY-MM-DD` to read recordings that were created on or after midnight of this date.
     *
     * @param string $dateCreatedBefore Only include recordings that were created
     *                                  on this date
     * @return $this Fluent Builder
     */
    public function setDateCreatedBefore($dateCreatedBefore) {
        $this->options['dateCreatedBefore'] = $dateCreatedBefore;
        return $this;
    }

    /**
     * Only include recordings that were created on this date. Specify a date as `YYYY-MM-DD` in GMT, for example: `2009-07-06`, to read recordings that were created on this date. You can also specify an inequality, such as `DateCreated<=YYYY-MM-DD`, to read recordings that were created on or before midnight of this date, and `DateCreated>=YYYY-MM-DD` to read recordings that were created on or after midnight of this date.
     *
     * @param string $dateCreated Only include recordings that were created on this
     *                            date
     * @return $this Fluent Builder
     */
    public function setDateCreated($dateCreated) {
        $this->options['dateCreated'] = $dateCreated;
        return $this;
    }

    /**
     * Only include recordings that were created on this date. Specify a date as `YYYY-MM-DD` in GMT, for example: `2009-07-06`, to read recordings that were created on this date. You can also specify an inequality, such as `DateCreated<=YYYY-MM-DD`, to read recordings that were created on or before midnight of this date, and `DateCreated>=YYYY-MM-DD` to read recordings that were created on or after midnight of this date.
     *
     * @param string $dateCreatedAfter Only include recordings that were created on
     *                                 this date
     * @return $this Fluent Builder
     */
    public function setDateCreatedAfter($dateCreatedAfter) {
        $this->options['dateCreatedAfter'] = $dateCreatedAfter;
        return $this;
    }

    /**
     * The [Call](https://www.twilio.com/docs/voice/api/call-resource) SID of the resources to read.
     *
     * @param string $callSid The Call SID of the resources to read
     * @return $this Fluent Builder
     */
    public function setCallSid($callSid) {
        $this->options['callSid'] = $callSid;
        return $this;
    }

    /**
     * The Conference SID that identifies the conference associated with the recording to read.
     *
     * @param string $conferenceSid Read by unique Conference SID for the recording
     * @return $this Fluent Builder
     */
    public function setConferenceSid($conferenceSid) {
        $this->options['conferenceSid'] = $conferenceSid;
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
        return '[Twilio.Api.V2010.ReadRecordingOptions ' . implode(' ', $options) . ']';
    }
}