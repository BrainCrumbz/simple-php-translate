<?php

require_once('workingTranslator.php');
require_once('brokenTranslator.php');

/**
  * Main class responsible for translation of text resources.
  *
  * This is the main class in SimplePhpTranslate. It is invoked 
  * in order to add translated text resources as well as to insert
  * those resources in the page.
  *
  * @author  BrainCrumbz <team@braincrumbz.com>
  */
class Translate {
	
	/**
	  * Constructor.
	  *
	  * Initialises internal instance state, having no language and 
	  * no resources set.
	  */
	public function __construct() {
		$this->resourceSets = array();
		$this->langOverride = '';
		
		$this->translator = new BrokenTranslator();
	}
	
	/**
	  * Adds resources translated in a language.
	  *
	  * Adds to the available set of translations a new set of text resources 
	  * for a specific language.
	  * 
	  * No error is flagged if a language is added multiple times: the latest
	  * set added overwrites all preceding ones.
	  * 
	  * @param  string  $lang  A unique text identifying the language. 
	  * Suggestion: use one of the available language codes (2-letters, 3-letters ISO, etc).
	  * 
	  * @param  Array  $set  The set of text resources to add.
	  */
	public function addLanguage($lang, $set) {
		$this->resourceSets[$lang] = $set;
		
		if ($this->translator->isBroken()) {
			$this->tryToFindLanguage();
		}
	}
	
	/**
	  * Tries to find the current language with its translated resources.
	  *
	  * Detects the language to be used and looks for translated resources
	  * in that language.
	  * 
	  * Internal state is updated successfully only if both are found.
	  */
	private function tryToFindLanguage() {
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
	
	/**
	  * Detects the language from the current request URL.
	  *
	  * Detects the language to be used in the current page, starting from its request URI.
	  * The URI should be in the form blabla/<lang>/blabla, where <lang> is one of
	  * the languages already added.
	  * 
	  * Note: this method is the only responsible for language detection in current page.
	  * It can be substituted if another detection method should be applied (e.g. HTTP header, 
	  * cookie, session, etc.)
	  * 
	  * @return  string  If successfully detected, the language ID (the same used when adding
	  * its resources). Otherwise the empty string ('').
	  */
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
	
	/**
	  * Sets current language, overriding any detection.
	  * 
	  * Sets the passed language as the one to be currently used, ignoring
	  * any past or future language detection performed.
	  * 
	  * @param  string  $lang  The language ID to be set (the same used when adding
	  * its resources). 
	  */
	public function overridePageLanguage($lang) {
		$this->langOverride = $lang;
		
		// resets translator: if the language has already been defined, 
		// the right one will be properly set 
		$this->translator = new BrokenTranslator();
		
		$this->tryToFindLanguage();
	}
	
	/**
	  * Translates a text resource from its ID.
	  * 
	  * Gets translation of a text resource in current language, given resource 
	  * unique identifier.
	  * 
	  * @param  string  $resId  The unique identifier of the resource to translate. 
	  * 
	  * @return  string  Translation in current language.
	  * 
	  * @throws  Exception if no current language is defined or its translations have
	  * not been defined.
	  */
	public function translate($resId) {
        return $this->translator->translate($resId);
	}
	
	/**
	  * Gets current language.
	  * 
	  * Gets unique ID of the current language, if any has been defined with its translations.
	  * 
	  * @param  string  $resId  The unique identifier of the resource to translate. 
	  * 
	  * @return  string  Translation in current language.
	  * 
	  * @throws  Exception if no current language is defined or its translations have
	  * not been defined.
	  */
	public function lang() {
        return $this->translator->lang();
    }
	
	/**
	  * Gets current language URL slug.
	  * 
	  * Gets an URL part that can be used to refer to other pages in the same 
	  * language as current one. It is actually the same as the language ID. 
	  * 
	  * This is useful only if URI language detection is applied, so that another page
	  * in the same language is referred by this URI part.
	  * 
	  * @return  string  URL part matching current language.
	  * 
	  * @throws  Exception if no current language is defined or its translations have
	  * not been defined.
	  */
	public function uriSlug() {
        return $this->translator->lang();
    }
	
	/**
    * @var  Array  Hashmap of translated resources for each language.
    */
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
	echo Translate::getInstance()->uriSlug();
}

Translate::initialize();
