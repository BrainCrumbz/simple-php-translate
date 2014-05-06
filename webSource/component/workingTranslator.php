<?php

class WorkingTranslator {
	
	public function __construct($lang, $set) {
		$this->currentPageLang = $lang;
		$this->resources = $set;
	}
	
	public function isBroken() {
		return false;
	}
	
	public function translate($resId) {
        return $this->resources[$resId];
	}
	
	public function lang() {
		return $this->currentPageLang;
    }
	
	public function slug() {
		return $this->currentPageLang;
    }
	
	private $currentPageLang;
	private $resources;
}
