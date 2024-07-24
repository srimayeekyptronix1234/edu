<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\Sync\Service;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Rest\Preview\Sync\Service\SyncMap\SyncMapItemList;
use Twilio\Rest\Preview\Sync\Service\SyncMap\SyncMapPermissionList;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property \Twilio\Rest\Preview\Sync\Service\SyncMap\SyncMapItemList $syncMapItems
 * @property \Twilio\Rest\Preview\Sync\Service\SyncMap\SyncMapPermissionList $syncMapPermissions
 * @method \Twilio\Rest\Preview\Sync\Service\SyncMap\SyncMapItemContext syncMapItems(string $key)
 * @method \Twilio\Rest\Preview\Sync\Service\SyncMap\SyncMapPermissionContext syncMapPermissions(string $identity)
 */
class SyncMapContext extends InstanceContext {
    protected $_syncMapItems = null;
    protected $_syncMapPermissions = null;

    /**
     * Initialize the SyncMapContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $serviceSid The service_sid
     * @param string $sid The sid
     * @return \Twilio\Rest\Preview\Sync\Service\SyncMapContext
     */
    public function __construct(Version $version, $serviceSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, 'sid' => $sid, );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Maps/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a SyncMapInstance
     *
     * @return SyncMapInstance Fetched SyncMapInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new SyncMapInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the SyncMapInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Access the syncMapItems
     *
     * @return \Twilio\Rest\Preview\Sync\Service\SyncMap\SyncMapItemList
     */
    protected function getSyncMapItems() {
        if (!$this->_syncMapItems) {
            $this->_syncMapItems = new SyncMapItemList(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['sid']
            );
        }

        return $this->_syncMapItems;
    }

    /**
     * Access the syncMapPermissions
     *
     * @return \Twilio\Rest\Preview\Sync\Service\SyncMap\SyncMapPermissionList
     */
    protected function getSyncMapPermissions() {
        if (!$this->_syncMapPermissions) {
            $this->_syncMapPermissions = new SyncMapPermissionList(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['sid']
            );
        }

        return $this->_syncMapPermissions;
    }

    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return \Twilio\ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get($name) {
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown subresource ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return \Twilio\InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call($name, $arguments) {
        $property = $this->$name;
        if (method_exists($property, 'getContext')) {
            return call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
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
        return '[Twilio.Preview.Sync.SyncMapContext ' . implode(' ', $context) . ']';
    }
}