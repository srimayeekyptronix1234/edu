<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\Sync\Service\SyncMap;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $accountSid
 * @property string $serviceSid
 * @property string $mapSid
 * @property string $identity
 * @property bool $read
 * @property bool $write
 * @property bool $manage
 * @property string $url
 */
class SyncMapPermissionInstance extends InstanceResource {
    /**
     * Initialize the SyncMapPermissionInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid Sync Service Instance SID.
     * @param string $mapSid Sync Map SID.
     * @param string $identity Identity of the user to whom the Sync Map Permission
     *                         applies.
     * @return \Twilio\Rest\Preview\Sync\Service\SyncMap\SyncMapPermissionInstance
     */
    public function __construct(Version $version, array $payload, $serviceSid, $mapSid, $identity = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'serviceSid' => Values::array_get($payload, 'service_sid'),
            'mapSid' => Values::array_get($payload, 'map_sid'),
            'identity' => Values::array_get($payload, 'identity'),
            'read' => Values::array_get($payload, 'read'),
            'write' => Values::array_get($payload, 'write'),
            'manage' => Values::array_get($payload, 'manage'),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array(
            'serviceSid' => $serviceSid,
            'mapSid' => $mapSid,
            'identity' => $identity ?: $this->properties['identity'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Preview\Sync\Service\SyncMap\SyncMapPermissionContext Context for this SyncMapPermissionInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new SyncMapPermissionContext(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['mapSid'],
                $this->solution['identity']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a SyncMapPermissionInstance
     *
     * @return SyncMapPermissionInstance Fetched SyncMapPermissionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the SyncMapPermissionInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Update the SyncMapPermissionInstance
     *
     * @param bool $read Read access.
     * @param bool $write Write access.
     * @param bool $manage Manage access.
     * @return SyncMapPermissionInstance Updated SyncMapPermissionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($read, $write, $manage) {
        return $this->proxy()->update($read, $write, $manage);
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Preview.Sync.SyncMapPermissionInstance ' . implode(' ', $context) . ']';
    }
}