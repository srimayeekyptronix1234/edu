<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\BulkExports\Export;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class ExportCustomJobOptions {
    /**
     * @param string $nextToken The token for the next page of job results
     * @param string $previousToken The token for the previous page of result
     * @return ReadExportCustomJobOptions Options builder
     */
    public static function read($nextToken = Values::NONE, $previousToken = Values::NONE) {
        return new ReadExportCustomJobOptions($nextToken, $previousToken);
    }

    /**
     * @param string $friendlyName The friendly_name
     * @param string $startDay The start_day
     * @param string $endDay The end_day
     * @param string $webhookUrl The webhook_url
     * @param string $webhookMethod The webhook_method
     * @param string $email The email
     * @return CreateExportCustomJobOptions Options builder
     */
    public static function create($friendlyName = Values::NONE, $startDay = Values::NONE, $endDay = Values::NONE, $webhookUrl = Values::NONE, $webhookMethod = Values::NONE, $email = Values::NONE) {
        return new CreateExportCustomJobOptions($friendlyName, $startDay, $endDay, $webhookUrl, $webhookMethod, $email);
    }
}

class ReadExportCustomJobOptions extends Options {
    /**
     * @param string $nextToken The token for the next page of job results
     * @param string $previousToken The token for the previous page of result
     */
    public function __construct($nextToken = Values::NONE, $previousToken = Values::NONE) {
        $this->options['nextToken'] = $nextToken;
        $this->options['previousToken'] = $previousToken;
    }

    /**
     * The token for the next page of job results, and may be null if there are no more pages
     *
     * @param string $nextToken The token for the next page of job results
     * @return $this Fluent Builder
     */
    public function setNextToken($nextToken) {
        $this->options['nextToken'] = $nextToken;
        return $this;
    }

    /**
     * The token for the previous page of results, and may be null if this is the first page
     *
     * @param string $previousToken The token for the previous page of result
     * @return $this Fluent Builder
     */
    public function setPreviousToken($previousToken) {
        $this->options['previousToken'] = $previousToken;
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
        return '[Twilio.Preview.BulkExports.ReadExportCustomJobOptions ' . implode(' ', $options) . ']';
    }
}

class CreateExportCustomJobOptions extends Options {
    /**
     * @param string $friendlyName The friendly_name
     * @param string $startDay The start_day
     * @param string $endDay The end_day
     * @param string $webhookUrl The webhook_url
     * @param string $webhookMethod The webhook_method
     * @param string $email The email
     */
    public function __construct($friendlyName = Values::NONE, $startDay = Values::NONE, $endDay = Values::NONE, $webhookUrl = Values::NONE, $webhookMethod = Values::NONE, $email = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['startDay'] = $startDay;
        $this->options['endDay'] = $endDay;
        $this->options['webhookUrl'] = $webhookUrl;
        $this->options['webhookMethod'] = $webhookMethod;
        $this->options['email'] = $email;
    }

    /**
     * The friendly_name
     *
     * @param string $friendlyName The friendly_name
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * The start_day
     *
     * @param string $startDay The start_day
     * @return $this Fluent Builder
     */
    public function setStartDay($startDay) {
        $this->options['startDay'] = $startDay;
        return $this;
    }

    /**
     * The end_day
     *
     * @param string $endDay The end_day
     * @return $this Fluent Builder
     */
    public function setEndDay($endDay) {
        $this->options['endDay'] = $endDay;
        return $this;
    }

    /**
     * The webhook_url
     *
     * @param string $webhookUrl The webhook_url
     * @return $this Fluent Builder
     */
    public function setWebhookUrl($webhookUrl) {
        $this->options['webhookUrl'] = $webhookUrl;
        return $this;
    }

    /**
     * The webhook_method
     *
     * @param string $webhookMethod The webhook_method
     * @return $this Fluent Builder
     */
    public function setWebhookMethod($webhookMethod) {
        $this->options['webhookMethod'] = $webhookMethod;
        return $this;
    }

    /**
     * The email
     *
     * @param string $email The email
     * @return $this Fluent Builder
     */
    public function setEmail($email) {
        $this->options['email'] = $email;
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
        return '[Twilio.Preview.BulkExports.CreateExportCustomJobOptions ' . implode(' ', $options) . ']';
    }
}