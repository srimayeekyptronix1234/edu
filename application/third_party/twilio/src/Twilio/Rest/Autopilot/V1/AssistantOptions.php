<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Autopilot\V1;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class AssistantOptions {
    /**
     * @param string $friendlyName A string to describe the new resource
     * @param bool $logQueries Whether queries should be logged and kept after
     *                         training
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the new resource
     * @param string $callbackUrl Reserved
     * @param string $callbackEvents Reserved
     * @param array $styleSheet A JSON string that defines the Assistant's style
     *                          sheet
     * @param array $defaults A JSON object that defines the Assistant's default
     *                        tasks for various scenarios
     * @return CreateAssistantOptions Options builder
     */
    public static function create($friendlyName = Values::NONE, $logQueries = Values::NONE, $uniqueName = Values::NONE, $callbackUrl = Values::NONE, $callbackEvents = Values::NONE, $styleSheet = Values::NONE, $defaults = Values::NONE) {
        return new CreateAssistantOptions($friendlyName, $logQueries, $uniqueName, $callbackUrl, $callbackEvents, $styleSheet, $defaults);
    }

    /**
     * @param string $friendlyName A string to describe the resource
     * @param bool $logQueries Whether queries should be logged and kept after
     *                         training
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the resource
     * @param string $callbackUrl Reserved
     * @param string $callbackEvents Reserved
     * @param array $styleSheet A JSON string that defines the Assistant's style
     *                          sheet
     * @param array $defaults A JSON object that defines the Assistant's [default
     *                        tasks](https://www.twilio.com/docs/autopilot/api/assistant/defaults) for various scenarios
     * @param string $developmentStage A string describing the state of the
     *                                 assistant.
     * @return UpdateAssistantOptions Options builder
     */
    public static function update($friendlyName = Values::NONE, $logQueries = Values::NONE, $uniqueName = Values::NONE, $callbackUrl = Values::NONE, $callbackEvents = Values::NONE, $styleSheet = Values::NONE, $defaults = Values::NONE, $developmentStage = Values::NONE) {
        return new UpdateAssistantOptions($friendlyName, $logQueries, $uniqueName, $callbackUrl, $callbackEvents, $styleSheet, $defaults, $developmentStage);
    }
}

class CreateAssistantOptions extends Options {
    /**
     * @param string $friendlyName A string to describe the new resource
     * @param bool $logQueries Whether queries should be logged and kept after
     *                         training
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the new resource
     * @param string $callbackUrl Reserved
     * @param string $callbackEvents Reserved
     * @param array $styleSheet A JSON string that defines the Assistant's style
     *                          sheet
     * @param array $defaults A JSON object that defines the Assistant's default
     *                        tasks for various scenarios
     */
    public function __construct($friendlyName = Values::NONE, $logQueries = Values::NONE, $uniqueName = Values::NONE, $callbackUrl = Values::NONE, $callbackEvents = Values::NONE, $styleSheet = Values::NONE, $defaults = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['logQueries'] = $logQueries;
        $this->options['uniqueName'] = $uniqueName;
        $this->options['callbackUrl'] = $callbackUrl;
        $this->options['callbackEvents'] = $callbackEvents;
        $this->options['styleSheet'] = $styleSheet;
        $this->options['defaults'] = $defaults;
    }

    /**
     * A descriptive string that you create to describe the new resource. It is not unique and can be up to 255 characters long.
     *
     * @param string $friendlyName A string to describe the new resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * Whether queries should be logged and kept after training. Can be: `true` or `false` and defaults to `true`. If `true`, queries are stored for 30 days, and then deleted. If `false`, no queries are stored.
     *
     * @param bool $logQueries Whether queries should be logged and kept after
     *                         training
     * @return $this Fluent Builder
     */
    public function setLogQueries($logQueries) {
        $this->options['logQueries'] = $logQueries;
        return $this;
    }

    /**
     * An application-defined string that uniquely identifies the new resource. It can be used as an alternative to the `sid` in the URL path to address the resource. The first 64 characters must be unique.
     *
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the new resource
     * @return $this Fluent Builder
     */
    public function setUniqueName($uniqueName) {
        $this->options['uniqueName'] = $uniqueName;
        return $this;
    }

    /**
     * Reserved.
     *
     * @param string $callbackUrl Reserved
     * @return $this Fluent Builder
     */
    public function setCallbackUrl($callbackUrl) {
        $this->options['callbackUrl'] = $callbackUrl;
        return $this;
    }

    /**
     * Reserved.
     *
     * @param string $callbackEvents Reserved
     * @return $this Fluent Builder
     */
    public function setCallbackEvents($callbackEvents) {
        $this->options['callbackEvents'] = $callbackEvents;
        return $this;
    }

    /**
     * The JSON string that defines the Assistant's [style sheet](https://www.twilio.com/docs/autopilot/api/assistant/stylesheet)
     *
     * @param array $styleSheet A JSON string that defines the Assistant's style
     *                          sheet
     * @return $this Fluent Builder
     */
    public function setStyleSheet($styleSheet) {
        $this->options['styleSheet'] = $styleSheet;
        return $this;
    }

    /**
     * A JSON object that defines the Assistant's [default tasks](https://www.twilio.com/docs/autopilot/api/assistant/defaults) for various scenarios, including initiation actions and fallback tasks.
     *
     * @param array $defaults A JSON object that defines the Assistant's default
     *                        tasks for various scenarios
     * @return $this Fluent Builder
     */
    public function setDefaults($defaults) {
        $this->options['defaults'] = $defaults;
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
        return '[Twilio.Autopilot.V1.CreateAssistantOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateAssistantOptions extends Options {
    /**
     * @param string $friendlyName A string to describe the resource
     * @param bool $logQueries Whether queries should be logged and kept after
     *                         training
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the resource
     * @param string $callbackUrl Reserved
     * @param string $callbackEvents Reserved
     * @param array $styleSheet A JSON string that defines the Assistant's style
     *                          sheet
     * @param array $defaults A JSON object that defines the Assistant's [default
     *                        tasks](https://www.twilio.com/docs/autopilot/api/assistant/defaults) for various scenarios
     * @param string $developmentStage A string describing the state of the
     *                                 assistant.
     */
    public function __construct($friendlyName = Values::NONE, $logQueries = Values::NONE, $uniqueName = Values::NONE, $callbackUrl = Values::NONE, $callbackEvents = Values::NONE, $styleSheet = Values::NONE, $defaults = Values::NONE, $developmentStage = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['logQueries'] = $logQueries;
        $this->options['uniqueName'] = $uniqueName;
        $this->options['callbackUrl'] = $callbackUrl;
        $this->options['callbackEvents'] = $callbackEvents;
        $this->options['styleSheet'] = $styleSheet;
        $this->options['defaults'] = $defaults;
        $this->options['developmentStage'] = $developmentStage;
    }

    /**
     * A descriptive string that you create to describe the resource. It is not unique and can be up to 255 characters long.
     *
     * @param string $friendlyName A string to describe the resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * Whether queries should be logged and kept after training. Can be: `true` or `false` and defaults to `true`. If `true`, queries are stored for 30 days, and then deleted. If `false`, no queries are stored.
     *
     * @param bool $logQueries Whether queries should be logged and kept after
     *                         training
     * @return $this Fluent Builder
     */
    public function setLogQueries($logQueries) {
        $this->options['logQueries'] = $logQueries;
        return $this;
    }

    /**
     * An application-defined string that uniquely identifies the resource. It can be used as an alternative to the `sid` in the URL path to address the resource. The first 64 characters must be unique.
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
     * Reserved.
     *
     * @param string $callbackUrl Reserved
     * @return $this Fluent Builder
     */
    public function setCallbackUrl($callbackUrl) {
        $this->options['callbackUrl'] = $callbackUrl;
        return $this;
    }

    /**
     * Reserved.
     *
     * @param string $callbackEvents Reserved
     * @return $this Fluent Builder
     */
    public function setCallbackEvents($callbackEvents) {
        $this->options['callbackEvents'] = $callbackEvents;
        return $this;
    }

    /**
     * The JSON string that defines the Assistant's [style sheet](https://www.twilio.com/docs/autopilot/api/assistant/stylesheet)
     *
     * @param array $styleSheet A JSON string that defines the Assistant's style
     *                          sheet
     * @return $this Fluent Builder
     */
    public function setStyleSheet($styleSheet) {
        $this->options['styleSheet'] = $styleSheet;
        return $this;
    }

    /**
     * A JSON object that defines the Assistant's [default tasks](https://www.twilio.com/docs/autopilot/api/assistant/defaults) for various scenarios, including initiation actions and fallback tasks.
     *
     * @param array $defaults A JSON object that defines the Assistant's [default
     *                        tasks](https://www.twilio.com/docs/autopilot/api/assistant/defaults) for various scenarios
     * @return $this Fluent Builder
     */
    public function setDefaults($defaults) {
        $this->options['defaults'] = $defaults;
        return $this;
    }

    /**
     * A string describing the state of the assistant.
     *
     * @param string $developmentStage A string describing the state of the
     *                                 assistant.
     * @return $this Fluent Builder
     */
    public function setDevelopmentStage($developmentStage) {
        $this->options['developmentStage'] = $developmentStage;
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
        return '[Twilio.Autopilot.V1.UpdateAssistantOptions ' . implode(' ', $options) . ']';
    }
}