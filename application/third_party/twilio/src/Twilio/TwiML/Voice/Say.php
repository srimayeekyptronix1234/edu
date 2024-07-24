<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Say extends TwiML {
    /**
     * Say constructor.
     *
     * @param string $message Message to say
     * @param array $attributes Optional attributes
     */
    public function __construct($message, $attributes = array()) {
        parent::__construct('Say', $message, $attributes);
    }

    /**
     * Add Break child.
     *
     * @param array $attributes Optional attributes
     * @return SsmlBreak Child element.
     */
    public function break_($attributes = array()) {
        return $this->nest(new SsmlBreak($attributes));
    }

    /**
     * Add Emphasis child.
     *
     * @param string $words Words to emphasize
     * @param array $attributes Optional attributes
     * @return SsmlEmphasis Child element.
     */
    public function emphasis($words, $attributes = array()) {
        return $this->nest(new SsmlEmphasis($words, $attributes));
    }

    /**
     * Add Lang child.
     *
     * @param string $words Words to speak
     * @param array $attributes Optional attributes
     * @return SsmlLang Child element.
     */
    public function lang($words, $attributes = array()) {
        return $this->nest(new SsmlLang($words, $attributes));
    }

    /**
     * Add P child.
     *
     * @param string $words Words to speak
     * @return SsmlP Child element.
     */
    public function p($words) {
        return $this->nest(new SsmlP($words));
    }

    /**
     * Add Phoneme child.
     *
     * @param string $words Words to speak
     * @param array $attributes Optional attributes
     * @return SsmlPhoneme Child element.
     */
    public function phoneme($words, $attributes = array()) {
        return $this->nest(new SsmlPhoneme($words, $attributes));
    }

    /**
     * Add Prosody child.
     *
     * @param string $words Words to speak
     * @param array $attributes Optional attributes
     * @return SsmlProsody Child element.
     */
    public function prosody($words, $attributes = array()) {
        return $this->nest(new SsmlProsody($words, $attributes));
    }

    /**
     * Add S child.
     *
     * @param string $words Words to speak
     * @return SsmlS Child element.
     */
    public function s($words) {
        return $this->nest(new SsmlS($words));
    }

    /**
     * Add Say-As child.
     *
     * @param string $words Words to be interpreted
     * @param array $attributes Optional attributes
     * @return SsmlSayAs Child element.
     */
    public function say_As($words, $attributes = array()) {
        return $this->nest(new SsmlSayAs($words, $attributes));
    }

    /**
     * Add Sub child.
     *
     * @param string $words Words to be substituted
     * @param array $attributes Optional attributes
     * @return SsmlSub Child element.
     */
    public function sub($words, $attributes = array()) {
        return $this->nest(new SsmlSub($words, $attributes));
    }

    /**
     * Add W child.
     *
     * @param string $words Words to speak
     * @param array $attributes Optional attributes
     * @return SsmlW Child element.
     */
    public function w($words, $attributes = array()) {
        return $this->nest(new SsmlW($words, $attributes));
    }

    /**
     * Add Voice attribute.
     *
     * @param string $voice Voice to use
     * @return static $this.
     */
    public function setVoice($voice) {
        return $this->setAttribute('voice', $voice);
    }

    /**
     * Add Loop attribute.
     *
     * @param int $loop Times to loop message
     * @return static $this.
     */
    public function setLoop($loop) {
        return $this->setAttribute('loop', $loop);
    }

    /**
     * Add Language attribute.
     *
     * @param string $language Message langauge
     * @return static $this.
     */
    public function setLanguage($language) {
        return $this->setAttribute('language', $language);
    }
}