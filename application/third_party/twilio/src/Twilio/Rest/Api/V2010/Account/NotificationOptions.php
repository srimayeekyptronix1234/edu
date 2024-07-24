<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Options;
use Twilio\Values;

abstract class NotificationOptions {
    /**
     * @param int $log Filter by log level
     * @param string $messageDateBefore Filter by date
     * @param string $messageDate Filter by date
     * @param string $messageDateAfter Filter by date
     * @return ReadNotificationOptions Options builder
     */
    public static function read($log = Values::NONE, $messageDateBefore = Values::NONE, $messageDate = Values::NONE, $messageDateAfter = Values::NONE) {
        return new ReadNotificationOptions($log, $messageDateBefore, $messageDate, $messageDateAfter);
    }
}

class ReadNotificationOptions extends Options {
    /**
     * @param int $log Filter by log level
     * @param string $messageDateBefore Filter by date
     * @param string $messageDate Filter by date
     * @param string $messageDateAfter Filter by date
     */
    public function __construct($log = Values::NONE, $messageDateBefore = Values::NONE, $messageDate = Values::NONE, $messageDateAfter = Values::NONE) {
        $this->options['log'] = $log;
        $this->options['messageDateBefore'] = $messageDateBefore;
        $this->options['messageDate'] = $messageDate;
        $this->options['messageDateAfter'] = $messageDateAfter;
    }

    /**
     * Only read notifications of the specified log level. Can be:  `0` to read only ERROR notifications or `1` to read only WARNING notifications. By default, all notifications are read.
     *
     * @param int $log Filter by log level
     * @return $this Fluent Builder
     */
    public function setLog($log) {
        $this->options['log'] = $log;
        return $this;
    }

    /**
     * Only show notifications for the specified date, formatted as `YYYY-MM-DD`. You can also specify an inequality, such as `<=YYYY-MM-DD` for messages logged at or before midnight on a date, or `>=YYYY-MM-DD` for messages logged at or after midnight on a date.
     *
     * @param string $messageDateBefore Filter by date
     * @return $this Fluent Builder
     */
    public function setMessageDateBefore($messageDateBefore) {
        $this->options['messageDateBefore'] = $messageDateBefore;
        return $this;
    }

    /**
     * Only show notifications for the specified date, formatted as `YYYY-MM-DD`. You can also specify an inequality, such as `<=YYYY-MM-DD` for messages logged at or before midnight on a date, or `>=YYYY-MM-DD` for messages logged at or after midnight on a date.
     *
     * @param string $messageDate Filter by date
     * @return $this Fluent Builder
     */
    public function setMessageDate($messageDate) {
        $this->options['messageDate'] = $messageDate;
        return $this;
    }

    /**
     * Only show notifications for the specified date, formatted as `YYYY-MM-DD`. You can also specify an inequality, such as `<=YYYY-MM-DD` for messages logged at or before midnight on a date, or `>=YYYY-MM-DD` for messages logged at or after midnight on a date.
     *
     * @param string $messageDateAfter Filter by date
     * @return $this Fluent Builder
     */
    public function setMessageDateAfter($messageDateAfter) {
        $this->options['messageDateAfter'] = $messageDateAfter;
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
        return '[Twilio.Api.V2010.ReadNotificationOptions ' . implode(' ', $options) . ']';
    }
}