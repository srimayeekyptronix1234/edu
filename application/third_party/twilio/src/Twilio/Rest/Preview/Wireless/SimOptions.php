<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\Wireless;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class SimOptions {
    /**
     * @param string $status The status
     * @param string $iccid The iccid
     * @param string $ratePlan The rate_plan
     * @param string $eId The e_id
     * @param string $simRegistrationCode The sim_registration_code
     * @return ReadSimOptions Options builder
     */
    public static function read($status = Values::NONE, $iccid = Values::NONE, $ratePlan = Values::NONE, $eId = Values::NONE, $simRegistrationCode = Values::NONE) {
        return new ReadSimOptions($status, $iccid, $ratePlan, $eId, $simRegistrationCode);
    }

    /**
     * @param string $uniqueName The unique_name
     * @param string $callbackMethod The callback_method
     * @param string $callbackUrl The callback_url
     * @param string $friendlyName The friendly_name
     * @param string $ratePlan The rate_plan
     * @param string $status The status
     * @param string $commandsCallbackMethod The commands_callback_method
     * @param string $commandsCallbackUrl The commands_callback_url
     * @param string $smsFallbackMethod The sms_fallback_method
     * @param string $smsFallbackUrl The sms_fallback_url
     * @param string $smsMethod The sms_method
     * @param string $smsUrl The sms_url
     * @param string $voiceFallbackMethod The voice_fallback_method
     * @param string $voiceFallbackUrl The voice_fallback_url
     * @param string $voiceMethod The voice_method
     * @param string $voiceUrl The voice_url
     * @return UpdateSimOptions Options builder
     */
    public static function update($uniqueName = Values::NONE, $callbackMethod = Values::NONE, $callbackUrl = Values::NONE, $friendlyName = Values::NONE, $ratePlan = Values::NONE, $status = Values::NONE, $commandsCallbackMethod = Values::NONE, $commandsCallbackUrl = Values::NONE, $smsFallbackMethod = Values::NONE, $smsFallbackUrl = Values::NONE, $smsMethod = Values::NONE, $smsUrl = Values::NONE, $voiceFallbackMethod = Values::NONE, $voiceFallbackUrl = Values::NONE, $voiceMethod = Values::NONE, $voiceUrl = Values::NONE) {
        return new UpdateSimOptions($uniqueName, $callbackMethod, $callbackUrl, $friendlyName, $ratePlan, $status, $commandsCallbackMethod, $commandsCallbackUrl, $smsFallbackMethod, $smsFallbackUrl, $smsMethod, $smsUrl, $voiceFallbackMethod, $voiceFallbackUrl, $voiceMethod, $voiceUrl);
    }
}

class ReadSimOptions extends Options {
    /**
     * @param string $status The status
     * @param string $iccid The iccid
     * @param string $ratePlan The rate_plan
     * @param string $eId The e_id
     * @param string $simRegistrationCode The sim_registration_code
     */
    public function __construct($status = Values::NONE, $iccid = Values::NONE, $ratePlan = Values::NONE, $eId = Values::NONE, $simRegistrationCode = Values::NONE) {
        $this->options['status'] = $status;
        $this->options['iccid'] = $iccid;
        $this->options['ratePlan'] = $ratePlan;
        $this->options['eId'] = $eId;
        $this->options['simRegistrationCode'] = $simRegistrationCode;
    }

    /**
     * The status
     *
     * @param string $status The status
     * @return $this Fluent Builder
     */
    public function setStatus($status) {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * The iccid
     *
     * @param string $iccid The iccid
     * @return $this Fluent Builder
     */
    public function setIccid($iccid) {
        $this->options['iccid'] = $iccid;
        return $this;
    }

    /**
     * The rate_plan
     *
     * @param string $ratePlan The rate_plan
     * @return $this Fluent Builder
     */
    public function setRatePlan($ratePlan) {
        $this->options['ratePlan'] = $ratePlan;
        return $this;
    }

    /**
     * The e_id
     *
     * @param string $eId The e_id
     * @return $this Fluent Builder
     */
    public function setEId($eId) {
        $this->options['eId'] = $eId;
        return $this;
    }

    /**
     * The sim_registration_code
     *
     * @param string $simRegistrationCode The sim_registration_code
     * @return $this Fluent Builder
     */
    public function setSimRegistrationCode($simRegistrationCode) {
        $this->options['simRegistrationCode'] = $simRegistrationCode;
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
        return '[Twilio.Preview.Wireless.ReadSimOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateSimOptions extends Options {
    /**
     * @param string $uniqueName The unique_name
     * @param string $callbackMethod The callback_method
     * @param string $callbackUrl The callback_url
     * @param string $friendlyName The friendly_name
     * @param string $ratePlan The rate_plan
     * @param string $status The status
     * @param string $commandsCallbackMethod The commands_callback_method
     * @param string $commandsCallbackUrl The commands_callback_url
     * @param string $smsFallbackMethod The sms_fallback_method
     * @param string $smsFallbackUrl The sms_fallback_url
     * @param string $smsMethod The sms_method
     * @param string $smsUrl The sms_url
     * @param string $voiceFallbackMethod The voice_fallback_method
     * @param string $voiceFallbackUrl The voice_fallback_url
     * @param string $voiceMethod The voice_method
     * @param string $voiceUrl The voice_url
     */
    public function __construct($uniqueName = Values::NONE, $callbackMethod = Values::NONE, $callbackUrl = Values::NONE, $friendlyName = Values::NONE, $ratePlan = Values::NONE, $status = Values::NONE, $commandsCallbackMethod = Values::NONE, $commandsCallbackUrl = Values::NONE, $smsFallbackMethod = Values::NONE, $smsFallbackUrl = Values::NONE, $smsMethod = Values::NONE, $smsUrl = Values::NONE, $voiceFallbackMethod = Values::NONE, $voiceFallbackUrl = Values::NONE, $voiceMethod = Values::NONE, $voiceUrl = Values::NONE) {
        $this->options['uniqueName'] = $uniqueName;
        $this->options['callbackMethod'] = $callbackMethod;
        $this->options['callbackUrl'] = $callbackUrl;
        $this->options['friendlyName'] = $friendlyName;
        $this->options['ratePlan'] = $ratePlan;
        $this->options['status'] = $status;
        $this->options['commandsCallbackMethod'] = $commandsCallbackMethod;
        $this->options['commandsCallbackUrl'] = $commandsCallbackUrl;
        $this->options['smsFallbackMethod'] = $smsFallbackMethod;
        $this->options['smsFallbackUrl'] = $smsFallbackUrl;
        $this->options['smsMethod'] = $smsMethod;
        $this->options['smsUrl'] = $smsUrl;
        $this->options['voiceFallbackMethod'] = $voiceFallbackMethod;
        $this->options['voiceFallbackUrl'] = $voiceFallbackUrl;
        $this->options['voiceMethod'] = $voiceMethod;
        $this->options['voiceUrl'] = $voiceUrl;
    }

    /**
     * The unique_name
     *
     * @param string $uniqueName The unique_name
     * @return $this Fluent Builder
     */
    public function setUniqueName($uniqueName) {
        $this->options['uniqueName'] = $uniqueName;
        return $this;
    }

    /**
     * The callback_method
     *
     * @param string $callbackMethod The callback_method
     * @return $this Fluent Builder
     */
    public function setCallbackMethod($callbackMethod) {
        $this->options['callbackMethod'] = $callbackMethod;
        return $this;
    }

    /**
     * The callback_url
     *
     * @param string $callbackUrl The callback_url
     * @return $this Fluent Builder
     */
    public function setCallbackUrl($callbackUrl) {
        $this->options['callbackUrl'] = $callbackUrl;
        return $this;
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
     * The rate_plan
     *
     * @param string $ratePlan The rate_plan
     * @return $this Fluent Builder
     */
    public function setRatePlan($ratePlan) {
        $this->options['ratePlan'] = $ratePlan;
        return $this;
    }

    /**
     * The status
     *
     * @param string $status The status
     * @return $this Fluent Builder
     */
    public function setStatus($status) {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * The commands_callback_method
     *
     * @param string $commandsCallbackMethod The commands_callback_method
     * @return $this Fluent Builder
     */
    public function setCommandsCallbackMethod($commandsCallbackMethod) {
        $this->options['commandsCallbackMethod'] = $commandsCallbackMethod;
        return $this;
    }

    /**
     * The commands_callback_url
     *
     * @param string $commandsCallbackUrl The commands_callback_url
     * @return $this Fluent Builder
     */
    public function setCommandsCallbackUrl($commandsCallbackUrl) {
        $this->options['commandsCallbackUrl'] = $commandsCallbackUrl;
        return $this;
    }

    /**
     * The sms_fallback_method
     *
     * @param string $smsFallbackMethod The sms_fallback_method
     * @return $this Fluent Builder
     */
    public function setSmsFallbackMethod($smsFallbackMethod) {
        $this->options['smsFallbackMethod'] = $smsFallbackMethod;
        return $this;
    }

    /**
     * The sms_fallback_url
     *
     * @param string $smsFallbackUrl The sms_fallback_url
     * @return $this Fluent Builder
     */
    public function setSmsFallbackUrl($smsFallbackUrl) {
        $this->options['smsFallbackUrl'] = $smsFallbackUrl;
        return $this;
    }

    /**
     * The sms_method
     *
     * @param string $smsMethod The sms_method
     * @return $this Fluent Builder
     */
    public function setSmsMethod($smsMethod) {
        $this->options['smsMethod'] = $smsMethod;
        return $this;
    }

    /**
     * The sms_url
     *
     * @param string $smsUrl The sms_url
     * @return $this Fluent Builder
     */
    public function setSmsUrl($smsUrl) {
        $this->options['smsUrl'] = $smsUrl;
        return $this;
    }

    /**
     * The voice_fallback_method
     *
     * @param string $voiceFallbackMethod The voice_fallback_method
     * @return $this Fluent Builder
     */
    public function setVoiceFallbackMethod($voiceFallbackMethod) {
        $this->options['voiceFallbackMethod'] = $voiceFallbackMethod;
        return $this;
    }

    /**
     * The voice_fallback_url
     *
     * @param string $voiceFallbackUrl The voice_fallback_url
     * @return $this Fluent Builder
     */
    public function setVoiceFallbackUrl($voiceFallbackUrl) {
        $this->options['voiceFallbackUrl'] = $voiceFallbackUrl;
        return $this;
    }

    /**
     * The voice_method
     *
     * @param string $voiceMethod The voice_method
     * @return $this Fluent Builder
     */
    public function setVoiceMethod($voiceMethod) {
        $this->options['voiceMethod'] = $voiceMethod;
        return $this;
    }

    /**
     * The voice_url
     *
     * @param string $voiceUrl The voice_url
     * @return $this Fluent Builder
     */
    public function setVoiceUrl($voiceUrl) {
        $this->options['voiceUrl'] = $voiceUrl;
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
        return '[Twilio.Preview.Wireless.UpdateSimOptions ' . implode(' ', $options) . ']';
    }
}