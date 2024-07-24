<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Conversations\V1\Conversation;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
abstract class MessageOptions {
    /**
     * @param string $author The channel specific identifier of the message's
     *                       author.
     * @param string $body The content of the message.
     * @param \DateTime $dateCreated The date that this resource was created.
     * @param \DateTime $dateUpdated The date that this resource was last updated.
     * @param string $attributes A string metadata field you can use to store any
     *                           data you wish.
     * @param string $mediaSid The Media Sid to be attached to the new Message.
     * @return CreateMessageOptions Options builder
     */
    public static function create($author = Values::NONE, $body = Values::NONE, $dateCreated = Values::NONE, $dateUpdated = Values::NONE, $attributes = Values::NONE, $mediaSid = Values::NONE) {
        return new CreateMessageOptions($author, $body, $dateCreated, $dateUpdated, $attributes, $mediaSid);
    }

    /**
     * @param string $author The channel specific identifier of the message's
     *                       author.
     * @param string $body The content of the message.
     * @param \DateTime $dateCreated The date that this resource was created.
     * @param \DateTime $dateUpdated The date that this resource was last updated.
     * @param string $attributes A string metadata field you can use to store any
     *                           data you wish.
     * @return UpdateMessageOptions Options builder
     */
    public static function update($author = Values::NONE, $body = Values::NONE, $dateCreated = Values::NONE, $dateUpdated = Values::NONE, $attributes = Values::NONE) {
        return new UpdateMessageOptions($author, $body, $dateCreated, $dateUpdated, $attributes);
    }
}

class CreateMessageOptions extends Options {
    /**
     * @param string $author The channel specific identifier of the message's
     *                       author.
     * @param string $body The content of the message.
     * @param \DateTime $dateCreated The date that this resource was created.
     * @param \DateTime $dateUpdated The date that this resource was last updated.
     * @param string $attributes A string metadata field you can use to store any
     *                           data you wish.
     * @param string $mediaSid The Media Sid to be attached to the new Message.
     */
    public function __construct($author = Values::NONE, $body = Values::NONE, $dateCreated = Values::NONE, $dateUpdated = Values::NONE, $attributes = Values::NONE, $mediaSid = Values::NONE) {
        $this->options['author'] = $author;
        $this->options['body'] = $body;
        $this->options['dateCreated'] = $dateCreated;
        $this->options['dateUpdated'] = $dateUpdated;
        $this->options['attributes'] = $attributes;
        $this->options['mediaSid'] = $mediaSid;
    }

    /**
     * The channel specific identifier of the message's author. Defaults to `system`.
     *
     * @param string $author The channel specific identifier of the message's
     *                       author.
     * @return $this Fluent Builder
     */
    public function setAuthor($author) {
        $this->options['author'] = $author;
        return $this;
    }

    /**
     * The content of the message, can be up to 1,600 characters long.
     *
     * @param string $body The content of the message.
     * @return $this Fluent Builder
     */
    public function setBody($body) {
        $this->options['body'] = $body;
        return $this;
    }

    /**
     * The date that this resource was created.
     *
     * @param \DateTime $dateCreated The date that this resource was created.
     * @return $this Fluent Builder
     */
    public function setDateCreated($dateCreated) {
        $this->options['dateCreated'] = $dateCreated;
        return $this;
    }

    /**
     * The date that this resource was last updated. `null` if the message has not been edited.
     *
     * @param \DateTime $dateUpdated The date that this resource was last updated.
     * @return $this Fluent Builder
     */
    public function setDateUpdated($dateUpdated) {
        $this->options['dateUpdated'] = $dateUpdated;
        return $this;
    }

    /**
     * A string metadata field you can use to store any data you wish. The string value must contain structurally valid JSON if specified.  **Note** that if the attributes are not set "{}" will be returned.
     *
     * @param string $attributes A string metadata field you can use to store any
     *                           data you wish.
     * @return $this Fluent Builder
     */
    public function setAttributes($attributes) {
        $this->options['attributes'] = $attributes;
        return $this;
    }

    /**
     * The Media Sid to be attached to the new Message.
     *
     * @param string $mediaSid The Media Sid to be attached to the new Message.
     * @return $this Fluent Builder
     */
    public function setMediaSid($mediaSid) {
        $this->options['mediaSid'] = $mediaSid;
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
        return '[Twilio.Conversations.V1.CreateMessageOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateMessageOptions extends Options {
    /**
     * @param string $author The channel specific identifier of the message's
     *                       author.
     * @param string $body The content of the message.
     * @param \DateTime $dateCreated The date that this resource was created.
     * @param \DateTime $dateUpdated The date that this resource was last updated.
     * @param string $attributes A string metadata field you can use to store any
     *                           data you wish.
     */
    public function __construct($author = Values::NONE, $body = Values::NONE, $dateCreated = Values::NONE, $dateUpdated = Values::NONE, $attributes = Values::NONE) {
        $this->options['author'] = $author;
        $this->options['body'] = $body;
        $this->options['dateCreated'] = $dateCreated;
        $this->options['dateUpdated'] = $dateUpdated;
        $this->options['attributes'] = $attributes;
    }

    /**
     * The channel specific identifier of the message's author. Defaults to `system`.
     *
     * @param string $author The channel specific identifier of the message's
     *                       author.
     * @return $this Fluent Builder
     */
    public function setAuthor($author) {
        $this->options['author'] = $author;
        return $this;
    }

    /**
     * The content of the message, can be up to 1,600 characters long.
     *
     * @param string $body The content of the message.
     * @return $this Fluent Builder
     */
    public function setBody($body) {
        $this->options['body'] = $body;
        return $this;
    }

    /**
     * The date that this resource was created.
     *
     * @param \DateTime $dateCreated The date that this resource was created.
     * @return $this Fluent Builder
     */
    public function setDateCreated($dateCreated) {
        $this->options['dateCreated'] = $dateCreated;
        return $this;
    }

    /**
     * The date that this resource was last updated. `null` if the message has not been edited.
     *
     * @param \DateTime $dateUpdated The date that this resource was last updated.
     * @return $this Fluent Builder
     */
    public function setDateUpdated($dateUpdated) {
        $this->options['dateUpdated'] = $dateUpdated;
        return $this;
    }

    /**
     * A string metadata field you can use to store any data you wish. The string value must contain structurally valid JSON if specified.  **Note** that if the attributes are not set "{}" will be returned.
     *
     * @param string $attributes A string metadata field you can use to store any
     *                           data you wish.
     * @return $this Fluent Builder
     */
    public function setAttributes($attributes) {
        $this->options['attributes'] = $attributes;
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
        return '[Twilio.Conversations.V1.UpdateMessageOptions ' . implode(' ', $options) . ']';
    }
}