<?php

class Translator {
	
	public function __construct() {
		$this->resourceSets = array();
		$this->langOverride = false;
		
		$this->currentPageLang = '';
		$this->resources = NULL;
	}
	
	public function addLanguage($langId, $set) {
		$this->resourceSets[$langId] = $set;
		
		if (empty($this->currentPageLang)) {
			$this->tryToFindLanguage();
		}
	}
	
	public function tryToFindLanguage() {
		$this->detectLanguageFromUri();
		
		if (!empty($this->currentPageLang)) {
			$this->resources = $this->resourceSets[$this->currentPageLang];
		}
	}
	
	private function detectLanguageFromUri() {
		$pageUrl = $_SERVER['REQUEST_URI'];
		
		$supportedLangs = array_keys($this->resourceSets);
		
		foreach ($supportedLangs as $supportedLang) {
			$urlPart = '/' . $supportedLang . '/';
			
			if (stripos($pageUrl, $urlPart) !== false) {
				$this->currentPageLang = $supportedLang;
				break;
			}
		}
	}
	
	public function overridePageLanguage($langId) {
		$this->currentPageLang = $langId;
		$this->resources = $this->resourceSets[$this->currentPageLang];
		
		$this->langOverride = true;
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
	
	private $resourceSets;
	private $langOverride;
	
	private $resources;
	private $currentPageLang;
	
	// Singleton access 
	
	public static function getInstance() {
		
		static $instance = null;
		
		if (null === $instance) {
            $instance = new Translator();
        }

        return $instance;
	}
}

function t($resId) {
	echo Translator::getInstance()->translate($resId);
}

function lang() {
	echo Translator::getInstance()->lang();
}

function slug() {
	echo Translator::getInstance()->slug();
}
