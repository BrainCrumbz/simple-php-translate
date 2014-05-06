<?php

/**
  * Non-working translator, for an undefined language.
  *
  * This translator can be used when no current language has been set 
  * or when its translated text resources have not been defined.
  *
  * @author  BrainCrumbz <team@braincrumbz.com>
  */
class BrokenTranslator {
	
	/**
	  * Constructor.
	  */
	public function __construct() {
		// Nothing to do
	}
	
	/**
	  * Detects whether this is a working translator or not. 
	  * Avoids need for an "is instanceOf" operator call.
	  * 
	  * @return  boolean  Always true;
	  */
	public function isBroken() {
		return true;
	}
	
	/**
	  * Should translates a text resource from its ID, but it just throws an exception.
	  * 
	  * @param  string  $resId  The unique identifier of the resource to translate. 
	  * 
	  * @return  string  Translation in current language.
	  * 
	  * @throws  Exception as no current language is defined or its translations have
	  * not been defined.
	  */
	public function translate($resId) {
        throw new Exception('Language not set');
	}
	
	/**
	  * Should get current language, but it just throws an exception.
	  * 
	  * @return  string  Unique ID of current defined language.
	  * 
	  * @throws  Exception as no current language is defined or its translations have
	  * not been defined.
	  */
	public function lang() {
        throw new Exception('Language not set');
    }
}
