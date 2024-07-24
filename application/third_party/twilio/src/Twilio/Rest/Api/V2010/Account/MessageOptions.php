<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Options;
use Twilio\Values;

abstract class MessageOptions {
    /**
     * @param string $from The phone number that initiated the message
     * @param string $messagingServiceSid The SID of the Messaging Service you want
     *                                    to associate with the message.
     * @param string $body The text of the message you want to send. Can be up to
     *                     1,600 characters in length.
     * @param string $mediaUrl The URL of the media to send with the message
     * @param string $statusCallback The URL we should call to send status
     *                               information to your application
     * @param string $applicationSid The application to use for callbacks
     * @param string $maxPrice The total maximum price up to 4 decimal places in US
     *                         dollars acceptable for the message to be delivered.
     * @param bool $provideFeedback Whether to confirm delivery of the message
     * @param int $validityPeriod The number of seconds that the message can remain
     *                            in our outgoing queue.
     * @param bool $forceDelivery Reserved
     * @param bool $smartEncoded Whether to detect Unicode characters that have a
     *                           similar GSM-7 character and replace them
     * @return CreateMessageOptions Options builder
     */
    public static function create($from = Values::NONE, $messagingServiceSid = Values::NONE, $body = Values::NONE, $mediaUrl = Values::NONE, $statusCallback = Values::NONE, $applicationSid = Values::NONE, $maxPrice = Values::NONE, $provideFeedback = Values::NONE, $validityPeriod = Values::NONE, $forceDelivery = Values::NONE, $smartEncoded = Values::NONE) {
        return new CreateMessageOptions($from, $messagingServiceSid, $body, $mediaUrl, $statusCallback, $applicationSid, $maxPrice, $provideFeedback, $validityPeriod, $forceDelivery, $smartEncoded);
    }

    /**
     * @param string $to Filter by messages sent to this number
     * @param string $from Filter by from number
     * @param string $dateSentBefore Filter by date sent
     * @param string $dateSent Filter by date sent
     * @param string $dateSentAfter Filter by date sent
     * @return ReadMessageOptions Options builder
     */
    public static function read($to = Values::NONE, $from = Values::NONE, $dateSentBefore = Values::NONE, $dateSent = Values::NONE, $dateSentAfter = Values::NONE) {
        return new ReadMessageOptions($to, $from, $dateSentBefore, $dateSent, $dateSentAfter);
    }
}

class CreateMessageOptions extends Options {
    /**
     * @param string $from The phone number that initiated the message
     * @param string $messagingServiceSid The SID of the Messaging Service you want
     *                                    to associate with the message.
     * @param string $body The text of the message you want to send. Can be up to
     *                     1,600 characters in length.
     * @param string $mediaUrl The URL of the media to send with the message
     * @param string $statusCallback The URL we should call to send status
     *                               information to your application
     * @param string $applicationSid The application to use for callbacks
     * @param string $maxPrice The total maximum price up to 4 decimal places in US
     *                         dollars acceptable for the message to be delivered.
     * @param bool $provideFeedback Whether to confirm delivery of the message
     * @param int $validityPeriod The number of seconds that the message can remain
     *                            in our outgoing queue.
     * @param bool $forceDelivery Reserved
     * @param bool $smartEncoded Whether to detect Unicode characters that have a
     *                           similar GSM-7 character and replace them
     */
    public function __construct($from = Values::NONE, $messagingServiceSid = Values::NONE, $body = Values::NONE, $mediaUrl = Values::NONE, $statusCallback = Values::NONE, $applicationSid = Values::NONE, $maxPrice = Values::NONE, $provideFeedback = Values::NONE, $validityPeriod = Values::NONE, $forceDelivery = Values::NONE, $smartEncoded = Values::NONE) {
        $this->options['from'] = $from;
        $this->options['messagingServiceSid'] = $messagingServiceSid;
        $this->options['body'] = $body;
        $this->options['mediaUrl'] = $mediaUrl;
        $this->options['statusCallback'] = $statusCallback;
        $this->options['applicationSid'] = $applicationSid;
        $this->options['maxPrice'] = $maxPrice;
        $this->options['provideFeedback'] = $provideFeedback;
        $this->options['validityPeriod'] = $validityPeriod;
        $this->options['forceDelivery'] = $forceDelivery;
        $this->options['smartEncoded'] = $smartEncoded;
    }

    /**
     * A Twilio phone number in [E.164](https://www.twilio.com/docs/glossary/what-e164) format, an [alphanumeric sender ID](https://www.twilio.com/docs/sms/send-messages#use-an-alphanumeric-sender-id), or a [Channel Endpoint address](https://www.twilio.com/docs/sms/channels#channel-addresses) that is enabled for the type of message you want to send. Phone numbers or [short codes](https://www.twilio.com/docs/sms/api/short-code) purchased from Twilio also work here. You cannot, for example, spoof messages from a private cell phone number. If you are using `messaging_service_sid`, this parameter must be empty.
     *
     * @param string $from The phone number that initiated the message
     * @return $this Fluent Builder
     */
    public function setFrom($from) {
        $this->options['from'] = $from;
        return $this;
    }

    /**
     * The SID of the [Messaging Service](https://www.twilio.com/docs/sms/services#send-a-message-with-copilot) you want to associate with the Message. Set this parameter to use the [Messaging Service Settings and Copilot Features](https://www.twilio.com/console/sms/services) you have configured and leave the `from` parameter empty. When only this parameter is set, Twilio will use your enabled Copilot Features to select the `from` phone number for delivery.
     *
     * @param string $messagingServiceSid The SID of the Messaging Service you want
     *                                    to associate with the message.
     * @return $this Fluent Builder
     */
    public function setMessagingServiceSid($messagingServiceSid) {
        $this->options['messagingServiceSid'] = $messagingServiceSid;
        return $this;
    }

    /**
     * The text of the message you want to send. Can be up to 1,600 characters in length.
     *
     * @param string $body The text of the message you want to send. Can be up to
     *                     1,600 characters in length.
     * @return $this Fluent Builder
     */
    public function setBody($body) {
        $this->options['body'] = $body;
        return $this;
    }

    /**
     * The URL of the media to send with the message. The media can be of type `gif`, `png`, and `jpeg` and will be formatted correctly on the recipient's device. [Other types](https://www.twilio.com/docs/sms/accepted-mime-types) of media are also accepted. The media size limit is 5MB. To send more than one image in the message body, provide multiple `media_url` parameters in the POST request. You can include up to 10 `media_url` parameters per message. You can send images in an SMS message in only the US and Canada.
     *
     * @param string $mediaUrl The URL of the media to send with the message
     * @return $this Fluent Builder
     */
    public function setMediaUrl($mediaUrl) {
        $this->options['mediaUrl'] = $mediaUrl;
        return $this;
    }

    /**
     * The URL we should call using the `status_callback_method` to send status information to your application. If specified, we POST these message status changes to the URL: `queued`, `failed`, `sent`, `delivered`, or `undelivered`. Twilio will POST its [standard request parameters](https://www.twilio.com/docs/sms/twiml#request-parameters) as well as some additional parameters including `MessageSid`, `MessageStatus`, and `ErrorCode`. If you include this parameter with the `messaging_service_sid`, we use this URL instead of the Status Callback URL of the [Messaging Service](https://www.twilio.com/docs/sms/services/api). URLs must contain a valid hostname and underscores are not allowed.
     *
     * @param string $statusCallback The URL we should call to send status
     *                               information to your application
     * @return $this Fluent Builder
     */
    public function setStatusCallback($statusCallback) {
        $this->options['statusCallback'] = $statusCallback;
        return $this;
    }

    /**
     * The SID of the application that should receive message status. We POST a `message_sid` parameter and a `message_status` parameter with a value of `sent` or `failed` to the [application](https://www.twilio.com/docs/usage/api/applications)'s `message_status_callback`. If a `status_callback` parameter is also passed, it will be ignored and the application's `message_status_callback` parameter will be used.
     *
     * @param string $applicationSid The application to use for callbacks
     * @return $this Fluent Builder
     */
    public function setApplicationSid($applicationSid) {
        $this->options['applicationSid'] = $applicationSid;
        return $this;
    }

    /**
     * The maximum total price in US dollars that you will pay for the message to be delivered. Can be a decimal value that has up to 4 decimal places. All messages are queued for delivery and the message cost is checked before the message is sent. If the cost exceeds `max_price`, the message will fail and a status of `Failed` is sent to the status callback. If `MaxPrice` is not set, the message cost is not checked.
     *
     * @param string $maxPrice The total maximum price up to 4 decimal places in US
     *                         dollars acceptable for the message to be delivered.
     * @return $this Fluent Builder
     */
    public function setMaxPrice($maxPrice) {
        $this->options['maxPrice'] = $maxPrice;
        return $this;
    }

    /**
     * Whether to confirm delivery of the message. Set this value to `true` if you are sending messages that have a trackable user action and you intend to confirm delivery of the message using the [Message Feedback API](https://www.twilio.com/docs/sms/api/message-feedback-resource). This parameter is `false` by default.
     *
     * @param bool $provideFeedback Whether to confirm delivery of the message
     * @return $this Fluent Builder
     */
    public function setProvideFeedback($provideFeedback) {
        $this->options['provideFeedback'] = $provideFeedback;
        return $this;
    }

    /**
     * How long in seconds the message can remain in our outgoing message queue. After this period elapses, the message fails and we call your status callback. Can be between 1 and the default value of 14,400 seconds. After a message has been accepted by a carrier, however, we cannot guarantee that the message will not be queued after this period. We recommend that this value be at least 5 seconds.
     *
     * @param int $validityPeriod The number of seconds that the message can remain
     *                            in our outgoing queue.
     * @return $this Fluent Builder
     */
    public function setValidityPeriod($validityPeriod) {
        $this->options['validityPeriod'] = $validityPeriod;
        return $this;
    }

    /**
     * Reserved
     *
     * @param bool $forceDelivery Reserved
     * @return $this Fluent Builder
     */
    public function setForceDelivery($forceDelivery) {
        $this->options['forceDelivery'] = $forceDelivery;
        return $this;
    }

    /**
     * Whether to detect Unicode characters that have a similar GSM-7 character and replace them. Can be: `true` or `false`.
     *
     * @param bool $smartEncoded Whether to detect Unicode characters that have a
     *                           similar GSM-7 character and replace them
     * @return $this Fluent Builder
     */
    public function setSmartEncoded($smartEncoded) {
        $this->options['smartEncoded'] = $smartEncoded;
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
        return '[Twilio.Api.V2010.CreateMessageOptions ' . implode(' ', $options) . ']';
    }
}

class ReadMessageOptions extends Options {
    /**
     * @param string $to Filter by messages sent to this number
     * @param string $from Filter by from number
     * @param string $dateSentBefore Filter by date sent
     * @param string $dateSent Filter by date sent
     * @param string $dateSentAfter Filter by date sent
     */
    public function __construct($to = Values::NONE, $from = Values::NONE, $dateSentBefore = Values::NONE, $dateSent = Values::NONE, $dateSentAfter = Values::NONE) {
        $this->options['to'] = $to;
        $this->options['from'] = $from;
        $this->options['dateSentBefore'] = $dateSentBefore;
        $this->options['dateSent'] = $dateSent;
        $this->options['dateSentAfter'] = $dateSentAfter;
    }

    /**
     * Read messages sent to only this phone number.
     *
     * @param string $to Filter by messages sent to this number
     * @return $this Fluent Builder
     */
    public function setTo($to) {
        $this->options['to'] = $to;
        return $this;
    }

    /**
     * Read messages sent from only this phone number or alphanumeric sender ID.
     *
     * @param string $from Filter by from number
     * @return $this Fluent Builder
     */
    public function setFrom($from) {
        $this->options['from'] = $from;
        return $this;
    }

    /**
     * The date of the messages to show. Specify a date as `YYYY-MM-DD` in GMT to read only messages sent on this date. For example: `2009-07-06`. You can also specify an inequality, such as `DateSent<=YYYY-MM-DD`, to read messages sent on or before midnight on a date, and `DateSent>=YYYY-MM-DD` to read messages sent on or after midnight on a date.
     *
     * @param string $dateSentBefore Filter by date sent
     * @return $this Fluent Builder
     */
    public function setDateSentBefore($dateSentBefore) {
        $this->options['dateSentBefore'] = $dateSentBefore;
        return $this;
    }

    /**
     * The date of the messages to show. Specify a date as `YYYY-MM-DD` in GMT to read only messages sent on this date. For example: `2009-07-06`. You can also specify an inequality, such as `DateSent<=YYYY-MM-DD`, to read messages sent on or before midnight on a date, and `DateSent>=YYYY-MM-DD` to read messages sent on or after midnight on a date.
     *
     * @param string $dateSent Filter by date sent
     * @return $this Fluent Builder
     */
    public function setDateSent($dateSent) {
        $this->options['dateSent'] = $dateSent;
        return $this;
    }

    /**
     * The date of the messages to show. Specify a date as `YYYY-MM-DD` in GMT to read only messages sent on this date. For example: `2009-07-06`. You can also specify an inequality, such as `DateSent<=YYYY-MM-DD`, to read messages sent on or before midnight on a date, and `DateSent>=YYYY-MM-DD` to read messages sent on or after midnight on a date.
     *
     * @param string $dateSentAfter Filter by date sent
     * @return $this Fluent Builder
     */
    public function setDateSentAfter($dateSentAfter) {
        $this->options['dateSentAfter'] = $dateSentAfter;
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
        return '[Twilio.Api.V2010.ReadMessageOptions ' . implode(' ', $options) . ']';
    }
}