<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Wireless\V1;

use Twilio\Options;
use Twilio\Values;

abstract class CommandOptions {
    /**
     * @param string $sim The sid or unique_name of the Sim resources to read
     * @param string $status The status of the resources to read
     * @param string $direction Only return Commands with this direction value
     * @param string $transport Only return Commands with this transport value
     * @return ReadCommandOptions Options builder
     */
    public static function read($sim = Values::NONE, $status = Values::NONE, $direction = Values::NONE, $transport = Values::NONE) {
        return new ReadCommandOptions($sim, $status, $direction, $transport);
    }

    /**
     * @param string $sim The sid or unique_name of the SIM to send the Command to
     * @param string $callbackMethod The HTTP method we use to call callback_url
     * @param string $callbackUrl he URL we call when the Command has finished
     *                            sending
     * @param string $commandMode The mode to use when sending the SMS message
     * @param string $includeSid Whether to include the SID of the command in the
     *                           message body
     * @param bool $deliveryReceiptRequested Whether to request delivery receipt
     *                                       from the recipient
     * @return CreateCommandOptions Options builder
     */
    public static function create($sim = Values::NONE, $callbackMethod = Values::NONE, $callbackUrl = Values::NONE, $commandMode = Values::NONE, $includeSid = Values::NONE, $deliveryReceiptRequested = Values::NONE) {
        return new CreateCommandOptions($sim, $callbackMethod, $callbackUrl, $commandMode, $includeSid, $deliveryReceiptRequested);
    }
}

class ReadCommandOptions extends Options {
    /**
     * @param string $sim The sid or unique_name of the Sim resources to read
     * @param string $status The status of the resources to read
     * @param string $direction Only return Commands with this direction value
     * @param string $transport Only return Commands with this transport value
     */
    public function __construct($sim = Values::NONE, $status = Values::NONE, $direction = Values::NONE, $transport = Values::NONE) {
        $this->options['sim'] = $sim;
        $this->options['status'] = $status;
        $this->options['direction'] = $direction;
        $this->options['transport'] = $transport;
    }

    /**
     * The `sid` or `unique_name` of the [Sim resources](https://www.twilio.com/docs/wireless/api/sim-resource) to read.
     *
     * @param string $sim The sid or unique_name of the Sim resources to read
     * @return $this Fluent Builder
     */
    public function setSim($sim) {
        $this->options['sim'] = $sim;
        return $this;
    }

    /**
     * The status of the resources to read. Can be: `queued`, `sent`, `delivered`, `received`, or `failed`.
     *
     * @param string $status The status of the resources to read
     * @return $this Fluent Builder
     */
    public function setStatus($status) {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * Only return Commands with this direction value.
     *
     * @param string $direction Only return Commands with this direction value
     * @return $this Fluent Builder
     */
    public function setDirection($direction) {
        $this->options['direction'] = $direction;
        return $this;
    }

    /**
     * Only return Commands with this transport value. Can be: `sms` or `ip`.
     *
     * @param string $transport Only return Commands with this transport value
     * @return $this Fluent Builder
     */
    public function setTransport($transport) {
        $this->options['transport'] = $transport;
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
        return '[Twilio.Wireless.V1.ReadCommandOptions ' . implode(' ', $options) . ']';
    }
}

class CreateCommandOptions extends Options {
    /**
     * @param string $sim The sid or unique_name of the SIM to send the Command to
     * @param string $callbackMethod The HTTP method we use to call callback_url
     * @param string $callbackUrl he URL we call when the Command has finished
     *                            sending
     * @param string $commandMode The mode to use when sending the SMS message
     * @param string $includeSid Whether to include the SID of the command in the
     *                           message body
     * @param bool $deliveryReceiptRequested Whether to request delivery receipt
     *                                       from the recipient
     */
    public function __construct($sim = Values::NONE, $callbackMethod = Values::NONE, $callbackUrl = Values::NONE, $commandMode = Values::NONE, $includeSid = Values::NONE, $deliveryReceiptRequested = Values::NONE) {
        $this->options['sim'] = $sim;
        $this->options['callbackMethod'] = $callbackMethod;
        $this->options['callbackUrl'] = $callbackUrl;
        $this->options['commandMode'] = $commandMode;
        $this->options['includeSid'] = $includeSid;
        $this->options['deliveryReceiptRequested'] = $deliveryReceiptRequested;
    }

    /**
     * The `sid` or `unique_name` of the [SIM](https://www.twilio.com/docs/wireless/api/sim-resource) to send the Command to.
     *
     * @param string $sim The sid or unique_name of the SIM to send the Command to
     * @return $this Fluent Builder
     */
    public function setSim($sim) {
        $this->options['sim'] = $sim;
        return $this;
    }

    /**
     * The HTTP method we use to call `callback_url`. Can be: `POST` or `GET`, and the default is `POST`.
     *
     * @param string $callbackMethod The HTTP method we use to call callback_url
     * @return $this Fluent Builder
     */
    public function setCallbackMethod($callbackMethod) {
        $this->options['callbackMethod'] = $callbackMethod;
        return $this;
    }

    /**
     * The URL we call using the `callback_url` when the Command has finished sending, whether the command was delivered or it failed.
     *
     * @param string $callbackUrl he URL we call when the Command has finished
     *                            sending
     * @return $this Fluent Builder
     */
    public function setCallbackUrl($callbackUrl) {
        $this->options['callbackUrl'] = $callbackUrl;
        return $this;
    }

    /**
     * The mode to use when sending the SMS message. Can be: `text` or `binary`. The default SMS mode is `text`.
     *
     * @param string $commandMode The mode to use when sending the SMS message
     * @return $this Fluent Builder
     */
    public function setCommandMode($commandMode) {
        $this->options['commandMode'] = $commandMode;
        return $this;
    }

    /**
     * Whether to include the SID of the command in the message body. Can be: `none`, `start`, or `end`, and the default behavior is `none`. When sending a Command to a SIM in text mode, we can automatically include the SID of the Command in the message body, which could be used to ensure that the device does not process the same Command more than once.  A value of `start` will prepend the message with the Command SID, and `end` will append it to the end, separating the Command SID from the message body with a space. The length of the Command SID is included in the 160 character limit so the SMS body must be 128 characters or less before the Command SID is included.
     *
     * @param string $includeSid Whether to include the SID of the command in the
     *                           message body
     * @return $this Fluent Builder
     */
    public function setIncludeSid($includeSid) {
        $this->options['includeSid'] = $includeSid;
        return $this;
    }

    /**
     * Whether to request delivery receipt from the recipient. For Commands that request delivery receipt, the Command state transitions to 'delivered' once the server has received a delivery receipt from the device. The default value is `true`.
     *
     * @param bool $deliveryReceiptRequested Whether to request delivery receipt
     *                                       from the recipient
     * @return $this Fluent Builder
     */
    public function setDeliveryReceiptRequested($deliveryReceiptRequested) {
        $this->options['deliveryReceiptRequested'] = $deliveryReceiptRequested;
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
        return '[Twilio.Wireless.V1.CreateCommandOptions ' . implode(' ', $options) . ']';
    }
}