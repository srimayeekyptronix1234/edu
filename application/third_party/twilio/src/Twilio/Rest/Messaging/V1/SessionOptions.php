<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Messaging\V1;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class SessionOptions {
    /**
     * @param string $friendlyName A string to describe the resource
     * @param string $attributes A JSON string that stores application-specific data
     * @param \DateTime $dateCreated The ISO 8601 date and time in GMT when the
     *                               resource was created
     * @param \DateTime $dateUpdated The ISO 8601 date and time in GMT when the
     *                               resource was updated
     * @param string $createdBy The Identity of the session's creator
     * @return CreateSessionOptions Options builder
     */
    public static function create($friendlyName = Values::NONE, $attributes = Values::NONE, $dateCreated = Values::NONE, $dateUpdated = Values::NONE, $createdBy = Values::NONE) {
        return new CreateSessionOptions($friendlyName, $attributes, $dateCreated, $dateUpdated, $createdBy);
    }

    /**
     * @param string $friendlyName A string to describe the resource
     * @param string $attributes A JSON string that stores application-specific data
     * @param \DateTime $dateCreated The ISO 8601 date and time in GMT when the
     *                               resource was created
     * @param \DateTime $dateUpdated The ISO 8601 date and time in GMT when the
     *                               resource was updated
     * @param string $createdBy The Identity of the session's creator
     * @return UpdateSessionOptions Options builder
     */
    public static function update($friendlyName = Values::NONE, $attributes = Values::NONE, $dateCreated = Values::NONE, $dateUpdated = Values::NONE, $createdBy = Values::NONE) {
        return new UpdateSessionOptions($friendlyName, $attributes, $dateCreated, $dateUpdated, $createdBy);
    }
}

class CreateSessionOptions extends Options {
    /**
     * @param string $friendlyName A string to describe the resource
     * @param string $attributes A JSON string that stores application-specific data
     * @param \DateTime $dateCreated The ISO 8601 date and time in GMT when the
     *                               resource was created
     * @param \DateTime $dateUpdated The ISO 8601 date and time in GMT when the
     *                               resource was updated
     * @param string $createdBy The Identity of the session's creator
     */
    public function __construct($friendlyName = Values::NONE, $attributes = Values::NONE, $dateCreated = Values::NONE, $dateUpdated = Values::NONE, $createdBy = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['attributes'] = $attributes;
        $this->options['dateCreated'] = $dateCreated;
        $this->options['dateUpdated'] = $dateUpdated;
        $this->options['createdBy'] = $createdBy;
    }

    /**
     * A descriptive string that you create to describe the resource. It can be up to 64 characters long.
     *
     * @param string $friendlyName A string to describe the resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
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
     * The Identity of the session's creator. If the Session was created through the API, the value will be `system`
     *
     * @param string $createdBy The Identity of the session's creator
     * @return $this Fluent Builder
     */
    public function setCreatedBy($createdBy) {
        $this->options['createdBy'] = $createdBy;
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
        return '[Twilio.Messaging.V1.CreateSessionOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateSessionOptions extends Options {
    /**
     * @param string $friendlyName A string to describe the resource
     * @param string $attributes A JSON string that stores application-specific data
     * @param \DateTime $dateCreated The ISO 8601 date and time in GMT when the
     *                               resource was created
     * @param \DateTime $dateUpdated The ISO 8601 date and time in GMT when the
     *                               resource was updated
     * @param string $createdBy The Identity of the session's creator
     */
    public function __construct($friendlyName = Values::NONE, $attributes = Values::NONE, $dateCreated = Values::NONE, $dateUpdated = Values::NONE, $createdBy = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['attributes'] = $attributes;
        $this->options['dateCreated'] = $dateCreated;
        $this->options['dateUpdated'] = $dateUpdated;
        $this->options['createdBy'] = $createdBy;
    }

    /**
     * A descriptive string that you create to describe the resource. It can be up to 64 characters long.
     *
     * @param string $friendlyName A string to describe the resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
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
     * The Identity of the session's creator. If the Session was created through the API, the value will be `system`
     *
     * @param string $createdBy The Identity of the session's creator
     * @return $this Fluent Builder
     */
    public function setCreatedBy($createdBy) {
        $this->options['createdBy'] = $createdBy;
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
        return '[Twilio.Messaging.V1.UpdateSessionOptions ' . implode(' ', $options) . ']';
    }
}