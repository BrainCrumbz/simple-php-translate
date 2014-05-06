<?php

require_once('workingTranslator.php');
require_once('brokenTranslator.php');

class Translate {
	
	public function __construct() {
		$this->resourceSets = array();
		$this->langOverride = '';
		
		$this->translator = new BrokenTranslator();
	}
	
	public function addLanguage($langId, $set) {
		$this->resourceSets[$langId] = $set;
		
		if ($this->translator->isBroken()) {
			$this->tryToFindLanguage();
		}
	}
	
	public function tryToFindLanguage() {
		if (empty($this->langOverride)) {
			$lang = $this->detectLanguageFromUri();
		}
		else {
			$supportedLangs = array_keys($this->resourceSets);
			
			if (in_array($langOverride, $supportedLangs)) {
				$lang = $langOverride;
			}
		}
		
		if (!empty($lang)) {
			$this->translator = new WorkingTranslator($lang, $this->resourceSets[$lang]);
		}
	}
	
	private function detectLanguageFromUri() {
		$pageUrl = $_SERVER['REQUEST_URI'];
		
		$supportedLangs = array_keys($this->resourceSets);
		
		$lang = '';
		
		foreach ($supportedLangs as $supportedLang) {
			$urlPart = '/' . $supportedLang . '/';
			
			if (stripos($pageUrl, $urlPart) !== false) {
				$lang = $supportedLang;
				break;
			}
		}
		
		return $lang;
	}
	
	public function overridePageLanguage($lang) {
		$this->langOverride = $lang;
		
		$this->translator = new BrokenTranslator();
	}
	
	public function translate($resId) {
        return $this->translator->translate($resId);
	}
	
	public function lang() {
        return $this->translator->lang();
    }
	
	public function slug() {
        return $this->translator->slug();
    }
	
	private $resourceSets;
	private $langOverride;
	private $translator;
	
	// Singleton access 
	
	public static function initialize() {
		self::$instance = new Translate();
	}
	
	public static function getInstance() {
		return self::$instance;
	}
	
	private static $instance = NULL;
}

function t($resId) {
	echo Translate::getInstance()->translate($resId);
}

function lang() {
	echo Translate::getInstance()->lang();
}

function slug() {
	echo Translate::getInstance()->slug();
}

Translate::initialize();
