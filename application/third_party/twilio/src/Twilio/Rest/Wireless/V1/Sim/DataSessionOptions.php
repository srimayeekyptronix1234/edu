<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Wireless\V1\Sim;

use Twilio\Options;
use Twilio\Values;

abstract class DataSessionOptions {
    /**
     * @param \DateTime $end The date that the record ended, given as GMT in ISO
     *                       8601 format
     * @param \DateTime $start The date that the Data Session started, given as GMT
     *                         in ISO 8601 format
     * @return ReadDataSessionOptions Options builder
     */
    public static function read($end = Values::NONE, $start = Values::NONE) {
        return new ReadDataSessionOptions($end, $start);
    }
}

class ReadDataSessionOptions extends Options {
    /**
     * @param \DateTime $end The date that the record ended, given as GMT in ISO
     *                       8601 format
     * @param \DateTime $start The date that the Data Session started, given as GMT
     *                         in ISO 8601 format
     */
    public function __construct($end = Values::NONE, $start = Values::NONE) {
        $this->options['end'] = $end;
        $this->options['start'] = $start;
    }

    /**
     * The date that the record ended, given as GMT in [ISO 8601](https://www.iso.org/iso-8601-date-and-time-format.html) format.
     *
     * @param \DateTime $end The date that the record ended, given as GMT in ISO
     *                       8601 format
     * @return $this Fluent Builder
     */
    public function setEnd($end) {
        $this->options['end'] = $end;
        return $this;
    }

    /**
     * The date that the Data Session started, given as GMT in [ISO 8601](https://www.iso.org/iso-8601-date-and-time-format.html) format.
     *
     * @param \DateTime $start The date that the Data Session started, given as GMT
     *                         in ISO 8601 format
     * @return $this Fluent Builder
     */
    public function setStart($start) {
        $this->options['start'] = $start;
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
        return '[Twilio.Wireless.V1.ReadDataSessionOptions ' . implode(' ', $options) . ']';
    }
}