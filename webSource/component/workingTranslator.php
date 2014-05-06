<?php

/**
  * Working translator, for a language with its translated resources.
  *
  * This translator can be used when a current language has been set 
  * and its translated text resources have been provided.
  *
  * @author  BrainCrumbz <team@braincrumbz.com>
  */
class WorkingTranslator {
	
	/**
	  * Constructor.
	  * 
	  * @param  string  $lang  ID of currently defined language. 
	  * @param  Array  $set  The set of text resources translated in the language.
	  */
	public function __construct($lang, $set) {
		$this->currentLang = $lang;
		$this->resources = $set;
	}
	
	/**
	  * Detects whether this is a working translator or not. 
	  * Avoids need for an "is instanceOf" operator call.
	  * 
	  * @return  boolean  Always false;
	  */
	public function isBroken() {
		return false;
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
	  */
	public function translate($resId) {
        return $this->resources[$resId];
	}
	
	/**
	  * Gets current language.
	  * 
	  * Gets unique ID of the current language.
	  * 
	  * @return  string  Unique ID of current defined language.
	  */
	public function lang() {
		return $this->currentLang;
    }
	
	/**
    * @var  string  ID of currently defined language.
    */
	private $currentLang;
	
	/**
    * @var  Array  $set  The set of text resources translated in current language.
    */
	private $resources;
}
