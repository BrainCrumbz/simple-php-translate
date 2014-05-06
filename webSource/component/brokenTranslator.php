<?php

class BrokenTranslator {
	
	public function __construct() {
		// Nothing to do
	}
	
	public function isBroken() {
		return true;
	}
	
	public function translate($resId) {
        throw new Exception('Language not set');
	}
	
	public function lang() {
        throw new Exception('Language not set');
    }
}
