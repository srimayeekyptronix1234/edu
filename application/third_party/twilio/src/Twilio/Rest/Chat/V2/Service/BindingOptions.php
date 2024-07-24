<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Chat\V2\Service;

use Twilio\Options;
use Twilio\Values;

abstract class BindingOptions {
    /**
     * @param string $bindingType The push technology used by the Binding resources
     *                            to read
     * @param string $identity The `identity` value of the resources to read
     * @return ReadBindingOptions Options builder
     */
    public static function read($bindingType = Values::NONE, $identity = Values::NONE) {
        return new ReadBindingOptions($bindingType, $identity);
    }
}

class ReadBindingOptions extends Options {
    /**
     * @param string $bindingType The push technology used by the Binding resources
     *                            to read
     * @param string $identity The `identity` value of the resources to read
     */
    public function __construct($bindingType = Values::NONE, $identity = Values::NONE) {
        $this->options['bindingType'] = $bindingType;
        $this->options['identity'] = $identity;
    }

    /**
     * The push technology used by the Binding resources to read.  Can be: `apn`, `gcm`, or `fcm`.  See [push notification configuration](https://www.twilio.com/docs/chat/push-notification-configuration) for more info.
     *
     * @param string $bindingType The push technology used by the Binding resources
     *                            to read
     * @return $this Fluent Builder
     */
    public function setBindingType($bindingType) {
        $this->options['bindingType'] = $bindingType;
        return $this;
    }

    /**
     * The [User](https://www.twilio.com/docs/chat/rest/user-resource)'s `identity` value of the resources to read. See [access tokens](https://www.twilio.com/docs/chat/create-tokens) for more details.
     *
     * @param string $identity The `identity` value of the resources to read
     * @return $this Fluent Builder
     */
    public function setIdentity($identity) {
        $this->options['identity'] = $identity;
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
        return '[Twilio.Chat.V2.ReadBindingOptions ' . implode(' ', $options) . ']';
    }
}