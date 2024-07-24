<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Wireless\V1;

use Twilio\Options;
use Twilio\Values;

abstract class RatePlanOptions {
    /**
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the resource
     * @param string $friendlyName A string to describe the resource
     * @param bool $dataEnabled Whether SIMs can use GPRS/3G/4G/LTE data
     *                          connectivity
     * @param int $dataLimit The total data usage in Megabytes that the Network
     *                       allows during one month on the home network
     * @param string $dataMetering The model used to meter data usage
     * @param bool $messagingEnabled Whether SIMs can make, send, and receive SMS
     *                               using Commands
     * @param bool $voiceEnabled Whether SIMs can make and receive voice calls
     * @param bool $nationalRoamingEnabled Whether SIMs can roam on networks other
     *                                     than the home network in the United
     *                                     States
     * @param string $internationalRoaming The services that SIMs capable of using
     *                                     GPRS/3G/4G/LTE data connectivity can use
     *                                     outside of the United States
     * @param int $nationalRoamingDataLimit The total data usage in Megabytes that
     *                                      the Network allows during one month on
     *                                      non-home networks in the United States
     * @param int $internationalRoamingDataLimit The total data usage (download and
     *                                           upload combined) in Megabytes that
     *                                           the Network allows during one
     *                                           month when roaming outside the
     *                                           United States
     * @return CreateRatePlanOptions Options builder
     */
    public static function create($uniqueName = Values::NONE, $friendlyName = Values::NONE, $dataEnabled = Values::NONE, $dataLimit = Values::NONE, $dataMetering = Values::NONE, $messagingEnabled = Values::NONE, $voiceEnabled = Values::NONE, $nationalRoamingEnabled = Values::NONE, $internationalRoaming = Values::NONE, $nationalRoamingDataLimit = Values::NONE, $internationalRoamingDataLimit = Values::NONE) {
        return new CreateRatePlanOptions($uniqueName, $friendlyName, $dataEnabled, $dataLimit, $dataMetering, $messagingEnabled, $voiceEnabled, $nationalRoamingEnabled, $internationalRoaming, $nationalRoamingDataLimit, $internationalRoamingDataLimit);
    }

    /**
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the resource
     * @param string $friendlyName A string to describe the resource
     * @return UpdateRatePlanOptions Options builder
     */
    public static function update($uniqueName = Values::NONE, $friendlyName = Values::NONE) {
        return new UpdateRatePlanOptions($uniqueName, $friendlyName);
    }
}

class CreateRatePlanOptions extends Options {
    /**
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the resource
     * @param string $friendlyName A string to describe the resource
     * @param bool $dataEnabled Whether SIMs can use GPRS/3G/4G/LTE data
     *                          connectivity
     * @param int $dataLimit The total data usage in Megabytes that the Network
     *                       allows during one month on the home network
     * @param string $dataMetering The model used to meter data usage
     * @param bool $messagingEnabled Whether SIMs can make, send, and receive SMS
     *                               using Commands
     * @param bool $voiceEnabled Whether SIMs can make and receive voice calls
     * @param bool $nationalRoamingEnabled Whether SIMs can roam on networks other
     *                                     than the home network in the United
     *                                     States
     * @param string $internationalRoaming The services that SIMs capable of using
     *                                     GPRS/3G/4G/LTE data connectivity can use
     *                                     outside of the United States
     * @param int $nationalRoamingDataLimit The total data usage in Megabytes that
     *                                      the Network allows during one month on
     *                                      non-home networks in the United States
     * @param int $internationalRoamingDataLimit The total data usage (download and
     *                                           upload combined) in Megabytes that
     *                                           the Network allows during one
     *                                           month when roaming outside the
     *                                           United States
     */
    public function __construct($uniqueName = Values::NONE, $friendlyName = Values::NONE, $dataEnabled = Values::NONE, $dataLimit = Values::NONE, $dataMetering = Values::NONE, $messagingEnabled = Values::NONE, $voiceEnabled = Values::NONE, $nationalRoamingEnabled = Values::NONE, $internationalRoaming = Values::NONE, $nationalRoamingDataLimit = Values::NONE, $internationalRoamingDataLimit = Values::NONE) {
        $this->options['uniqueName'] = $uniqueName;
        $this->options['friendlyName'] = $friendlyName;
        $this->options['dataEnabled'] = $dataEnabled;
        $this->options['dataLimit'] = $dataLimit;
        $this->options['dataMetering'] = $dataMetering;
        $this->options['messagingEnabled'] = $messagingEnabled;
        $this->options['voiceEnabled'] = $voiceEnabled;
        $this->options['nationalRoamingEnabled'] = $nationalRoamingEnabled;
        $this->options['internationalRoaming'] = $internationalRoaming;
        $this->options['nationalRoamingDataLimit'] = $nationalRoamingDataLimit;
        $this->options['internationalRoamingDataLimit'] = $internationalRoamingDataLimit;
    }

    /**
     * An application-defined string that uniquely identifies the resource. It can be used in place of the resource's `sid` in the URL to address the resource.
     *
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the resource
     * @return $this Fluent Builder
     */
    public function setUniqueName($uniqueName) {
        $this->options['uniqueName'] = $uniqueName;
        return $this;
    }

    /**
     * A descriptive string that you create to describe the resource. It does not have to be unique.
     *
     * @param string $friendlyName A string to describe the resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * Whether SIMs can use GPRS/3G/4G/LTE data connectivity.
     *
     * @param bool $dataEnabled Whether SIMs can use GPRS/3G/4G/LTE data
     *                          connectivity
     * @return $this Fluent Builder
     */
    public function setDataEnabled($dataEnabled) {
        $this->options['dataEnabled'] = $dataEnabled;
        return $this;
    }

    /**
     * The total data usage (download and upload combined) in Megabytes that the Network allows during one month on the home network (T-Mobile USA). The metering period begins the day of activation and ends on the same day in the following month. Can be up to 2TB and the default value is `1000`.
     *
     * @param int $dataLimit The total data usage in Megabytes that the Network
     *                       allows during one month on the home network
     * @return $this Fluent Builder
     */
    public function setDataLimit($dataLimit) {
        $this->options['dataLimit'] = $dataLimit;
        return $this;
    }

    /**
     * The model used to meter data usage. Can be: `payg` and `quota-1`, `quota-10`, and `quota-50`. Learn more about the available [data metering models](https://www.twilio.com/docs/wireless/api/rateplan-resource#payg-vs-quota-data-plans).
     *
     * @param string $dataMetering The model used to meter data usage
     * @return $this Fluent Builder
     */
    public function setDataMetering($dataMetering) {
        $this->options['dataMetering'] = $dataMetering;
        return $this;
    }

    /**
     * Whether SIMs can make, send, and receive SMS using [Commands](https://www.twilio.com/docs/wireless/api/command-resource).
     *
     * @param bool $messagingEnabled Whether SIMs can make, send, and receive SMS
     *                               using Commands
     * @return $this Fluent Builder
     */
    public function setMessagingEnabled($messagingEnabled) {
        $this->options['messagingEnabled'] = $messagingEnabled;
        return $this;
    }

    /**
     * Whether SIMs can make and receive voice calls.
     *
     * @param bool $voiceEnabled Whether SIMs can make and receive voice calls
     * @return $this Fluent Builder
     */
    public function setVoiceEnabled($voiceEnabled) {
        $this->options['voiceEnabled'] = $voiceEnabled;
        return $this;
    }

    /**
     * Whether SIMs can roam on networks other than the home network (T-Mobile USA) in the United States. See [national roaming](https://www.twilio.com/docs/wireless/api/rateplan-resource#national-roaming).
     *
     * @param bool $nationalRoamingEnabled Whether SIMs can roam on networks other
     *                                     than the home network in the United
     *                                     States
     * @return $this Fluent Builder
     */
    public function setNationalRoamingEnabled($nationalRoamingEnabled) {
        $this->options['nationalRoamingEnabled'] = $nationalRoamingEnabled;
        return $this;
    }

    /**
     * The list of services that SIMs capable of using GPRS/3G/4G/LTE data connectivity can use outside of the United States. Can be: `data`, `voice`, and `messaging`.
     *
     * @param string $internationalRoaming The services that SIMs capable of using
     *                                     GPRS/3G/4G/LTE data connectivity can use
     *                                     outside of the United States
     * @return $this Fluent Builder
     */
    public function setInternationalRoaming($internationalRoaming) {
        $this->options['internationalRoaming'] = $internationalRoaming;
        return $this;
    }

    /**
     * The total data usage (download and upload combined) in Megabytes that the Network allows during one month on non-home networks in the United States. The metering period begins the day of activation and ends on the same day in the following month. Can be up to 2TB. See [national roaming](https://www.twilio.com/docs/wireless/api/rateplan-resource#national-roaming) for more info.
     *
     * @param int $nationalRoamingDataLimit The total data usage in Megabytes that
     *                                      the Network allows during one month on
     *                                      non-home networks in the United States
     * @return $this Fluent Builder
     */
    public function setNationalRoamingDataLimit($nationalRoamingDataLimit) {
        $this->options['nationalRoamingDataLimit'] = $nationalRoamingDataLimit;
        return $this;
    }

    /**
     * The total data usage (download and upload combined) in Megabytes that the Network allows during one month when roaming outside the United States. Can be up to 2TB.
     *
     * @param int $internationalRoamingDataLimit The total data usage (download and
     *                                           upload combined) in Megabytes that
     *                                           the Network allows during one
     *                                           month when roaming outside the
     *                                           United States
     * @return $this Fluent Builder
     */
    public function setInternationalRoamingDataLimit($internationalRoamingDataLimit) {
        $this->options['internationalRoamingDataLimit'] = $internationalRoamingDataLimit;
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
        return '[Twilio.Wireless.V1.CreateRatePlanOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateRatePlanOptions extends Options {
    /**
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the resource
     * @param string $friendlyName A string to describe the resource
     */
    public function __construct($uniqueName = Values::NONE, $friendlyName = Values::NONE) {
        $this->options['uniqueName'] = $uniqueName;
        $this->options['friendlyName'] = $friendlyName;
    }

    /**
     * An application-defined string that uniquely identifies the resource. It can be used in place of the resource's `sid` in the URL to address the resource.
     *
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the resource
     * @return $this Fluent Builder
     */
    public function setUniqueName($uniqueName) {
        $this->options['uniqueName'] = $uniqueName;
        return $this;
    }

    /**
     * A descriptive string that you create to describe the resource. It does not have to be unique.
     *
     * @param string $friendlyName A string to describe the resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
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
        return '[Twilio.Wireless.V1.UpdateRatePlanOptions ' . implode(' ', $options) . ']';
    }
}