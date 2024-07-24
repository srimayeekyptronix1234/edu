<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account\Call;

use Twilio\Options;
use Twilio\Values;

abstract class RecordingOptions {
    /**
     * @param string $recordingStatusCallbackEvent The recording status changes
     *                                             that should generate a callback
     * @param string $recordingStatusCallback The callback URL on each selected
     *                                        recording event
     * @param string $recordingStatusCallbackMethod The HTTP method we should use
     *                                              to call
     *                                              `recording_status_callback`
     * @param string $trim Whether to trim the silence in the recording
     * @param string $recordingChannels The number of channels that the output
     *                                  recording will be configured with
     * @return CreateRecordingOptions Options builder
     */
    public static function create($recordingStatusCallbackEvent = Values::NONE, $recordingStatusCallback = Values::NONE, $recordingStatusCallbackMethod = Values::NONE, $trim = Values::NONE, $recordingChannels = Values::NONE) {
        return new CreateRecordingOptions($recordingStatusCallbackEvent, $recordingStatusCallback, $recordingStatusCallbackMethod, $trim, $recordingChannels);
    }

    /**
     * @param string $pauseBehavior Whether to record or not during the pause
     *                              period.
     * @return UpdateRecordingOptions Options builder
     */
    public static function update($pauseBehavior = Values::NONE) {
        return new UpdateRecordingOptions($pauseBehavior);
    }

    /**
     * @param string $dateCreatedBefore The `YYYY-MM-DD` value of the resources to
     *                                  read
     * @param string $dateCreated The `YYYY-MM-DD` value of the resources to read
     * @param string $dateCreatedAfter The `YYYY-MM-DD` value of the resources to
     *                                 read
     * @return ReadRecordingOptions Options builder
     */
    public static function read($dateCreatedBefore = Values::NONE, $dateCreated = Values::NONE, $dateCreatedAfter = Values::NONE) {
        return new ReadRecordingOptions($dateCreatedBefore, $dateCreated, $dateCreatedAfter);
    }
}

class CreateRecordingOptions extends Options {
    /**
     * @param string $recordingStatusCallbackEvent The recording status changes
     *                                             that should generate a callback
     * @param string $recordingStatusCallback The callback URL on each selected
     *                                        recording event
     * @param string $recordingStatusCallbackMethod The HTTP method we should use
     *                                              to call
     *                                              `recording_status_callback`
     * @param string $trim Whether to trim the silence in the recording
     * @param string $recordingChannels The number of channels that the output
     *                                  recording will be configured with
     */
    public function __construct($recordingStatusCallbackEvent = Values::NONE, $recordingStatusCallback = Values::NONE, $recordingStatusCallbackMethod = Values::NONE, $trim = Values::NONE, $recordingChannels = Values::NONE) {
        $this->options['recordingStatusCallbackEvent'] = $recordingStatusCallbackEvent;
        $this->options['recordingStatusCallback'] = $recordingStatusCallback;
        $this->options['recordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;
        $this->options['trim'] = $trim;
        $this->options['recordingChannels'] = $recordingChannels;
    }

    /**
     * The recording status events on which we should call the `recording_status_callback` URL. Can be: `in-progress`, `completed` and `absent` and the default is `completed`. Separate multiple event values with a space.
     *
     * @param string $recordingStatusCallbackEvent The recording status changes
     *                                             that should generate a callback
     * @return $this Fluent Builder
     */
    public function setRecordingStatusCallbackEvent($recordingStatusCallbackEvent) {
        $this->options['recordingStatusCallbackEvent'] = $recordingStatusCallbackEvent;
        return $this;
    }

    /**
     * The URL we should call using the `recording_status_callback_method` on each recording event specified in  `recording_status_callback_event`. For more information, see [RecordingStatusCallback parameters](https://www.twilio.com/docs/voice/api/recording#recordingstatuscallback).
     *
     * @param string $recordingStatusCallback The callback URL on each selected
     *                                        recording event
     * @return $this Fluent Builder
     */
    public function setRecordingStatusCallback($recordingStatusCallback) {
        $this->options['recordingStatusCallback'] = $recordingStatusCallback;
        return $this;
    }

    /**
     * The HTTP method we should use to call `recording_status_callback`. Can be: `GET` or `POST` and the default is `POST`.
     *
     * @param string $recordingStatusCallbackMethod The HTTP method we should use
     *                                              to call
     *                                              `recording_status_callback`
     * @return $this Fluent Builder
     */
    public function setRecordingStatusCallbackMethod($recordingStatusCallbackMethod) {
        $this->options['recordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;
        return $this;
    }

    /**
     * Whether to trim any leading and trailing silence in the recording. Can be: `trim-silence` or `do-not-trim` and the default is `do-not-trim`. `trim-silence` trims the silence from the beginning and end of the recording and `do-not-trim` does not.
     *
     * @param string $trim Whether to trim the silence in the recording
     * @return $this Fluent Builder
     */
    public function setTrim($trim) {
        $this->options['trim'] = $trim;
        return $this;
    }

    /**
     * The number of channels used in the recording. Can be: `mono` or `dual` and the default is `mono`. `mono` records all parties of the call into one channel. `dual` records each party of a 2-party call into separate channels.
     *
     * @param string $recordingChannels The number of channels that the output
     *                                  recording will be configured with
     * @return $this Fluent Builder
     */
    public function setRecordingChannels($recordingChannels) {
        $this->options['recordingChannels'] = $recordingChannels;
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
        return '[Twilio.Api.V2010.CreateRecordingOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateRecordingOptions extends Options {
    /**
     * @param string $pauseBehavior Whether to record or not during the pause
     *                              period.
     */
    public function __construct($pauseBehavior = Values::NONE) {
        $this->options['pauseBehavior'] = $pauseBehavior;
    }

    /**
     * Whether to record during a pause. Can be: `skip` or `silence` and the default is `silence`. `skip` does not record during the pause period, while `silence` will replace the actual audio of the call with silence during the pause period. This parameter only applies when setting `status` is set to `paused`.
     *
     * @param string $pauseBehavior Whether to record or not during the pause
     *                              period.
     * @return $this Fluent Builder
     */
    public function setPauseBehavior($pauseBehavior) {
        $this->options['pauseBehavior'] = $pauseBehavior;
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
        return '[Twilio.Api.V2010.UpdateRecordingOptions ' . implode(' ', $options) . ']';
    }
}

class ReadRecordingOptions extends Options {
    /**
     * @param string $dateCreatedBefore The `YYYY-MM-DD` value of the resources to
     *                                  read
     * @param string $dateCreated The `YYYY-MM-DD` value of the resources to read
     * @param string $dateCreatedAfter The `YYYY-MM-DD` value of the resources to
     *                                 read
     */
    public function __construct($dateCreatedBefore = Values::NONE, $dateCreated = Values::NONE, $dateCreatedAfter = Values::NONE) {
        $this->options['dateCreatedBefore'] = $dateCreatedBefore;
        $this->options['dateCreated'] = $dateCreated;
        $this->options['dateCreatedAfter'] = $dateCreatedAfter;
    }

    /**
     * The `date_created` value, specified as `YYYY-MM-DD`, of the resources to read. You can also specify inequality: `DateCreated<=YYYY-MM-DD` will return recordings generated at or before midnight on a given date, and `DateCreated>=YYYY-MM-DD` returns recordings generated at or after midnight on a date.
     *
     * @param string $dateCreatedBefore The `YYYY-MM-DD` value of the resources to
     *                                  read
     * @return $this Fluent Builder
     */
    public function setDateCreatedBefore($dateCreatedBefore) {
        $this->options['dateCreatedBefore'] = $dateCreatedBefore;
        return $this;
    }

    /**
     * The `date_created` value, specified as `YYYY-MM-DD`, of the resources to read. You can also specify inequality: `DateCreated<=YYYY-MM-DD` will return recordings generated at or before midnight on a given date, and `DateCreated>=YYYY-MM-DD` returns recordings generated at or after midnight on a date.
     *
     * @param string $dateCreated The `YYYY-MM-DD` value of the resources to read
     * @return $this Fluent Builder
     */
    public function setDateCreated($dateCreated) {
        $this->options['dateCreated'] = $dateCreated;
        return $this;
    }

    /**
     * The `date_created` value, specified as `YYYY-MM-DD`, of the resources to read. You can also specify inequality: `DateCreated<=YYYY-MM-DD` will return recordings generated at or before midnight on a given date, and `DateCreated>=YYYY-MM-DD` returns recordings generated at or after midnight on a date.
     *
     * @param string $dateCreatedAfter The `YYYY-MM-DD` value of the resources to
     *                                 read
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
        return '[Twilio.Api.V2010.ReadRecordingOptions ' . implode(' ', $options) . ']';
    }
}