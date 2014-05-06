<?php

class Translator {
	
	private $resourceSets;
	private $langOverride;
	
	private $resources;
	private $currentLang;
	
	public function __construct() {
		$this->resourceSets = array();
		$this->langOverride = '';
	}
	
	public function addLanguage($langId, $set) {
		$this->resourceSets[$langId] = $set;
	}
	
	public function overridePageLanguage($langId) {
		$this->langOverride = $langId;
	}
	
	public function findLanguage() {
		if (!empty($this->langOverride)) {
			$lang = $this->langOverride;
		}
		else {
			$lang = $this->detectLanguageFromUri();
		}
		
		if (array_key_exists($lang, $this->resourceSets)) {
			$this->resources = $this->resourceSets[$lang];
			$this->currentLang = $lang;
		}
		else {
			throw new Exception('Unsupported language: ' . $lang . '.');
		}
	}
	
	private function detectLanguageFromUri() {
		$lang = '';
		
		$pageUrl = $_SERVER['REQUEST_URI'];
		
		$supportedLangs = array_keys($this->resourceSets);
		
		foreach ($supportedLangs as $supportedLang) {
			$urlPart = '/' . $supportedLang . '/';
			
			if (stripos($pageUrl, $urlPart) !== false) {
				$lang = $supportedLang;
				break;
			}
		}
		
		if (empty($lang)) {
			throw new Exception('Cannot detect page language.');
		}
		
		return $lang;
	}
	
	public function translate($resId) {
        return $this->resources[$resId];
	}
	
	public function lang() {
		return $this->currentLang;
    }
	
	public function slug() {
		return $this->currentLang;
    }
}
