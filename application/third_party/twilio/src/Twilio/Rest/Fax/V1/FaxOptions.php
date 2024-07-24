<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Fax\V1;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
abstract class FaxOptions {
    /**
     * @param string $from Retrieve only those faxes sent from this phone number
     * @param string $to Retrieve only those faxes sent to this phone number
     * @param \DateTime $dateCreatedOnOrBefore Retrieve only faxes created on or
     *                                         before this date
     * @param \DateTime $dateCreatedAfter Retrieve only faxes created after this
     *                                    date
     * @return ReadFaxOptions Options builder
     */
    public static function read($from = Values::NONE, $to = Values::NONE, $dateCreatedOnOrBefore = Values::NONE, $dateCreatedAfter = Values::NONE) {
        return new ReadFaxOptions($from, $to, $dateCreatedOnOrBefore, $dateCreatedAfter);
    }

    /**
     * @param string $quality The quality of this fax
     * @param string $statusCallback The URL we should call to send status
     *                               information to your application
     * @param string $from The number the fax was sent from
     * @param string $sipAuthUsername The username for SIP authentication
     * @param string $sipAuthPassword The password for SIP authentication
     * @param bool $storeMedia Whether to store a copy of the sent media
     * @param int $ttl How long in minutes to try to send the fax
     * @return CreateFaxOptions Options builder
     */
    public static function create($quality = Values::NONE, $statusCallback = Values::NONE, $from = Values::NONE, $sipAuthUsername = Values::NONE, $sipAuthPassword = Values::NONE, $storeMedia = Values::NONE, $ttl = Values::NONE) {
        return new CreateFaxOptions($quality, $statusCallback, $from, $sipAuthUsername, $sipAuthPassword, $storeMedia, $ttl);
    }

    /**
     * @param string $status The new status of the resource
     * @return UpdateFaxOptions Options builder
     */
    public static function update($status = Values::NONE) {
        return new UpdateFaxOptions($status);
    }
}

class ReadFaxOptions extends Options {
    /**
     * @param string $from Retrieve only those faxes sent from this phone number
     * @param string $to Retrieve only those faxes sent to this phone number
     * @param \DateTime $dateCreatedOnOrBefore Retrieve only faxes created on or
     *                                         before this date
     * @param \DateTime $dateCreatedAfter Retrieve only faxes created after this
     *                                    date
     */
    public function __construct($from = Values::NONE, $to = Values::NONE, $dateCreatedOnOrBefore = Values::NONE, $dateCreatedAfter = Values::NONE) {
        $this->options['from'] = $from;
        $this->options['to'] = $to;
        $this->options['dateCreatedOnOrBefore'] = $dateCreatedOnOrBefore;
        $this->options['dateCreatedAfter'] = $dateCreatedAfter;
    }

    /**
     * Retrieve only those faxes sent from this phone number, specified in [E.164](https://www.twilio.com/docs/glossary/what-e164) format.
     *
     * @param string $from Retrieve only those faxes sent from this phone number
     * @return $this Fluent Builder
     */
    public function setFrom($from) {
        $this->options['from'] = $from;
        return $this;
    }

    /**
     * Retrieve only those faxes sent to this phone number, specified in [E.164](https://www.twilio.com/docs/glossary/what-e164) format.
     *
     * @param string $to Retrieve only those faxes sent to this phone number
     * @return $this Fluent Builder
     */
    public function setTo($to) {
        $this->options['to'] = $to;
        return $this;
    }

    /**
     * Retrieve only those faxes with a `date_created` that is before or equal to this value, specified in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format.
     *
     * @param \DateTime $dateCreatedOnOrBefore Retrieve only faxes created on or
     *                                         before this date
     * @return $this Fluent Builder
     */
    public function setDateCreatedOnOrBefore($dateCreatedOnOrBefore) {
        $this->options['dateCreatedOnOrBefore'] = $dateCreatedOnOrBefore;
        return $this;
    }

    /**
     * Retrieve only those faxes with a `date_created` that is later than this value, specified in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format.
     *
     * @param \DateTime $dateCreatedAfter Retrieve only faxes created after this
     *                                    date
     * @return $this Fluent Builder
     */
    public function setDateCreatedAfter($dateCreatedAfter) {
        $this->options['dateCreatedAfter'] = $dateCreatedAfter;
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
        return '[Twilio.Fax.V1.ReadFaxOptions ' . implode(' ', $options) . ']';
    }
}

class CreateFaxOptions extends Options {
    /**
     * @param string $quality The quality of this fax
     * @param string $statusCallback The URL we should call to send status
     *                               information to your application
     * @param string $from The number the fax was sent from
     * @param string $sipAuthUsername The username for SIP authentication
     * @param string $sipAuthPassword The password for SIP authentication
     * @param bool $storeMedia Whether to store a copy of the sent media
     * @param int $ttl How long in minutes to try to send the fax
     */
    public function __construct($quality = Values::NONE, $statusCallback = Values::NONE, $from = Values::NONE, $sipAuthUsername = Values::NONE, $sipAuthPassword = Values::NONE, $storeMedia = Values::NONE, $ttl = Values::NONE) {
        $this->options['quality'] = $quality;
        $this->options['statusCallback'] = $statusCallback;
        $this->options['from'] = $from;
        $this->options['sipAuthUsername'] = $sipAuthUsername;
        $this->options['sipAuthPassword'] = $sipAuthPassword;
        $this->options['storeMedia'] = $storeMedia;
        $this->options['ttl'] = $ttl;
    }

    /**
     * The [Fax Quality value](https://www.twilio.com/docs/fax/api/fax-resource#fax-quality-values) that describes the fax quality. Can be: `standard`, `fine`, or `superfine` and defaults to `fine`.
     *
     * @param string $quality The quality of this fax
     * @return $this Fluent Builder
     */
    public function setQuality($quality) {
        $this->options['quality'] = $quality;
        return $this;
    }

    /**
     * The URL we should call using the `POST` method to send [status information](https://www.twilio.com/docs/fax/api/fax-resource#fax-status-callback) to your application when the status of the fax changes.
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
     * The number the fax was sent from. Can be the phone number in [E.164](https://www.twilio.com/docs/glossary/what-e164) format or the SIP `from` value. The caller ID displayed to the recipient uses this value. If this is a phone number, it must be a Twilio number or a verified outgoing caller id from your account. If `to` is a SIP address, this can be any alphanumeric string (and also the characters `+`, `_`, `.`, and `-`), which will be used in the `from` header of the SIP request.
     *
     * @param string $from The number the fax was sent from
     * @return $this Fluent Builder
     */
    public function setFrom($from) {
        $this->options['from'] = $from;
        return $this;
    }

    /**
     * The username to use with the `sip_auth_password` to authenticate faxes sent to a SIP address.
     *
     * @param string $sipAuthUsername The username for SIP authentication
     * @return $this Fluent Builder
     */
    public function setSipAuthUsername($sipAuthUsername) {
        $this->options['sipAuthUsername'] = $sipAuthUsername;
        return $this;
    }

    /**
     * The password to use with `sip_auth_username` to authenticate faxes sent to a SIP address.
     *
     * @param string $sipAuthPassword The password for SIP authentication
     * @return $this Fluent Builder
     */
    public function setSipAuthPassword($sipAuthPassword) {
        $this->options['sipAuthPassword'] = $sipAuthPassword;
        return $this;
    }

    /**
     * Whether to store a copy of the sent media on our servers for later retrieval. Can be: `true` or `false` and the default is `true`.
     *
     * @param bool $storeMedia Whether to store a copy of the sent media
     * @return $this Fluent Builder
     */
    public function setStoreMedia($storeMedia) {
        $this->options['storeMedia'] = $storeMedia;
        return $this;
    }

    /**
     * How long in minutes from when the fax is initiated that we should try to send the fax.
     *
     * @param int $ttl How long in minutes to try to send the fax
     * @return $this Fluent Builder
     */
    public function setTtl($ttl) {
        $this->options['ttl'] = $ttl;
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
        return '[Twilio.Fax.V1.CreateFaxOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateFaxOptions extends Options {
    /**
     * @param string $status The new status of the resource
     */
    public function __construct($status = Values::NONE) {
        $this->options['status'] = $status;
    }

    /**
     * The new [status](https://www.twilio.com/docs/fax/api/fax-resource#fax-status-values) of the resource. Can be only `canceled`. This may fail if transmission has already started.
     *
     * @param string $status The new status of the resource
     * @return $this Fluent Builder
     */
    public function setStatus($status) {
        $this->options['status'] = $status;
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
        return '[Twilio.Fax.V1.UpdateFaxOptions ' . implode(' ', $options) . ']';
    }
}