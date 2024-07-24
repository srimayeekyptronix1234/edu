<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Room extends TwiML {
    /**
     * Room constructor.
     *
     * @param string $name Room name
     * @param array $attributes Optional attributes
     */
    public function __construct($name, $attributes = array()) {
        parent::__construct('Room', $name, $attributes);
    }

    /**
     * Add ParticipantIdentity attribute.
     *
     * @param string $participantIdentity Participant identity when connecting to
     *                                    the Room
     * @return static $this.
     */
    public function setParticipantIdentity($participantIdentity) {
        return $this->setAttribute('participantIdentity', $participantIdentity);
    }
}