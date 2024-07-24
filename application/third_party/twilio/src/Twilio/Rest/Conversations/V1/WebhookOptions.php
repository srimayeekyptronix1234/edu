<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Conversations\V1;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
abstract class WebhookOptions {
    /**
     * @param string $method The HTTP method to be used when sending a webhook
     *                       request.
     * @param string $filters The list of webhook event triggers that are enabled
     *                        for this Service.
     * @param string $preWebhookUrl The absolute url the pre-event webhook request
     *                              should be sent to.
     * @param string $postWebhookUrl The absolute url the post-event webhook
     *                               request should be sent to.
     * @param string $target The routing target of the webhook.
     * @return UpdateWebhookOptions Options builder
     */
    public static function update($method = Values::NONE, $filters = Values::NONE, $preWebhookUrl = Values::NONE, $postWebhookUrl = Values::NONE, $target = Values::NONE) {
        return new UpdateWebhookOptions($method, $filters, $preWebhookUrl, $postWebhookUrl, $target);
    }
}

class UpdateWebhookOptions extends Options {
    /**
     * @param string $method The HTTP method to be used when sending a webhook
     *                       request.
     * @param string $filters The list of webhook event triggers that are enabled
     *                        for this Service.
     * @param string $preWebhookUrl The absolute url the pre-event webhook request
     *                              should be sent to.
     * @param string $postWebhookUrl The absolute url the post-event webhook
     *                               request should be sent to.
     * @param string $target The routing target of the webhook.
     */
    public function __construct($method = Values::NONE, $filters = Values::NONE, $preWebhookUrl = Values::NONE, $postWebhookUrl = Values::NONE, $target = Values::NONE) {
        $this->options['method'] = $method;
        $this->options['filters'] = $filters;
        $this->options['preWebhookUrl'] = $preWebhookUrl;
        $this->options['postWebhookUrl'] = $postWebhookUrl;
        $this->options['target'] = $target;
    }

    /**
     * The HTTP method to be used when sending a webhook request.
     *
     * @param string $method The HTTP method to be used when sending a webhook
     *                       request.
     * @return $this Fluent Builder
     */
    public function setMethod($method) {
        $this->options['method'] = $method;
        return $this;
    }

    /**
     * The list of webhook event triggers that are enabled for this Service: `onMessageAdded`, `onMessageUpdated`, `onMessageRemoved`, `onConversationUpdated`, `onConversationRemoved`, `onParticipantAdded`, `onParticipantUpdated`, `onParticipantRemoved`
     *
     * @param string $filters The list of webhook event triggers that are enabled
     *                        for this Service.
     * @return $this Fluent Builder
     */
    public function setFilters($filters) {
        $this->options['filters'] = $filters;
        return $this;
    }

    /**
     * The absolute url the pre-event webhook request should be sent to.
     *
     * @param string $preWebhookUrl The absolute url the pre-event webhook request
     *                              should be sent to.
     * @return $this Fluent Builder
     */
    public function setPreWebhookUrl($preWebhookUrl) {
        $this->options['preWebhookUrl'] = $preWebhookUrl;
        return $this;
    }

    /**
     * The absolute url the post-event webhook request should be sent to.
     *
     * @param string $postWebhookUrl The absolute url the post-event webhook
     *                               request should be sent to.
     * @return $this Fluent Builder
     */
    public function setPostWebhookUrl($postWebhookUrl) {
        $this->options['postWebhookUrl'] = $postWebhookUrl;
        return $this;
    }

    /**
     * The routing target of the webhook. Can be ordinary or route internally to Flex
     *
     * @param string $target The routing target of the webhook.
     * @return $this Fluent Builder
     */
    public function setTarget($target) {
        $this->options['target'] = $target;
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
        return '[Twilio.Conversations.V1.UpdateWebhookOptions ' . implode(' ', $options) . ']';
    }
}