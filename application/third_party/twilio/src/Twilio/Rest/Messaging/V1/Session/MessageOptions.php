<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Messaging\V1\Session;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class MessageOptions {
    /**
     * @param string $author The identity of the message's author
     * @param string $attributes A JSON string that stores application-specific data
     * @param \DateTime $dateCreated The ISO 8601 date and time in GMT when the
     *                               resource was created
     * @param \DateTime $dateUpdated The ISO 8601 date and time in GMT when the
     *                               resource was updated
     * @param string $body The message body
     * @return CreateMessageOptions Options builder
     */
    public static function create($author = Values::NONE, $attributes = Values::NONE, $dateCreated = Values::NONE, $dateUpdated = Values::NONE, $body = Values::NONE) {
        return new CreateMessageOptions($author, $attributes, $dateCreated, $dateUpdated, $body);
    }

    /**
     * @param string $author The identity of the message's author
     * @param string $attributes A JSON string that stores application-specific data
     * @param \DateTime $dateCreated The ISO 8601 date and time in GMT when the
     *                               resource was created
     * @param \DateTime $dateUpdated The ISO 8601 date and time in GMT when the
     *                               resource was updated
     * @param string $body The message body
     * @return UpdateMessageOptions Options builder
     */
    public static function update($author = Values::NONE, $attributes = Values::NONE, $dateCreated = Values::NONE, $dateUpdated = Values::NONE, $body = Values::NONE) {
        return new UpdateMessageOptions($author, $attributes, $dateCreated, $dateUpdated, $body);
    }
}

class CreateMessageOptions extends Options {
    /**
     * @param string $author The identity of the message's author
     * @param string $attributes A JSON string that stores application-specific data
     * @param \DateTime $dateCreated The ISO 8601 date and time in GMT when the
     *                               resource was created
     * @param \DateTime $dateUpdated The ISO 8601 date and time in GMT when the
     *                               resource was updated
     * @param string $body The message body
     */
    public function __construct($author = Values::NONE, $attributes = Values::NONE, $dateCreated = Values::NONE, $dateUpdated = Values::NONE, $body = Values::NONE) {
        $this->options['author'] = $author;
        $this->options['attributes'] = $attributes;
        $this->options['dateCreated'] = $dateCreated;
        $this->options['dateUpdated'] = $dateUpdated;
        $this->options['body'] = $body;
    }

    /**
     * The [identity](https://www.twilio.com/docs/chat/identity) of the message's author. Defaults to `system`.
     *
     * @param string $author The identity of the message's author
     * @return $this Fluent Builder
     */
    public function setAuthor($author) {
        $this->options['author'] = $author;
        return $this;
    }

    /**
     * A JSON string that stores application-specific data.
     *
     * @param string $attributes A JSON string that stores application-specific data
     * @return $this Fluent Builder
     */
    public function setAttributes($attributes) {
        $this->options['attributes'] = $attributes;
        return $this;
    }

    /**
     * The date, specified in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format, to assign to the resource as the date it was created.
     *
     * @param \DateTime $dateCreated The ISO 8601 date and time in GMT when the
     *                               resource was created
     * @return $this Fluent Builder
     */
    public function setDateCreated($dateCreated) {
        $this->options['dateCreated'] = $dateCreated;
        return $this;
    }

    /**
     * The date, specified in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format, to assign to the resource as the date it was last updated.
     *
     * @param \DateTime $dateUpdated The ISO 8601 date and time in GMT when the
     *                               resource was updated
     * @return $this Fluent Builder
     */
    public function setDateUpdated($dateUpdated) {
        $this->options['dateUpdated'] = $dateUpdated;
        return $this;
    }

    /**
     * The message body.
     *
     * @param string $body The message body
     * @return $this Fluent Builder
     */
    public function setBody($body) {
        $this->options['body'] = $body;
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
        return '[Twilio.Messaging.V1.CreateMessageOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateMessageOptions extends Options {
    /**
     * @param string $author The identity of the message's author
     * @param string $attributes A JSON string that stores application-specific data
     * @param \DateTime $dateCreated The ISO 8601 date and time in GMT when the
     *                               resource was created
     * @param \DateTime $dateUpdated The ISO 8601 date and time in GMT when the
     *                               resource was updated
     * @param string $body The message body
     */
    public function __construct($author = Values::NONE, $attributes = Values::NONE, $dateCreated = Values::NONE, $dateUpdated = Values::NONE, $body = Values::NONE) {
        $this->options['author'] = $author;
        $this->options['attributes'] = $attributes;
        $this->options['dateCreated'] = $dateCreated;
        $this->options['dateUpdated'] = $dateUpdated;
        $this->options['body'] = $body;
    }

    /**
     * The [identity](https://www.twilio.com/docs/chat/identity) of the message's author. Defaults to `system`.
     *
     * @param string $author The identity of the message's author
     * @return $this Fluent Builder
     */
    public function setAuthor($author) {
        $this->options['author'] = $author;
        return $this;
    }

    /**
     * A JSON string that stores application-specific data.
     *
     * @param string $attributes A JSON string that stores application-specific data
     * @return $this Fluent Builder
     */
    public function setAttributes($attributes) {
        $this->options['attributes'] = $attributes;
        return $this;
    }

    /**
     * The date, specified in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format, to assign to the resource as the date it was created.
     *
     * @param \DateTime $dateCreated The ISO 8601 date and time in GMT when the
     *                               resource was created
     * @return $this Fluent Builder
     */
    public function setDateCreated($dateCreated) {
        $this->options['dateCreated'] = $dateCreated;
        return $this;
    }

    /**
     * The date, specified in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format, to assign to the resource as the date it was last updated.
     *
     * @param \DateTime $dateUpdated The ISO 8601 date and time in GMT when the
     *                               resource was updated
     * @return $this Fluent Builder
     */
    public function setDateUpdated($dateUpdated) {
        $this->options['dateUpdated'] = $dateUpdated;
        return $this;
    }

    /**
     * The message body.
     *
     * @param string $body The message body
     * @return $this Fluent Builder
     */
    public function setBody($body) {
        $this->options['body'] = $body;
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
        return '[Twilio.Messaging.V1.UpdateMessageOptions ' . implode(' ', $options) . ']';
    }
}