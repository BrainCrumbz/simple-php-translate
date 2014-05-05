<?php
/*
 * NOTE: 
 * this class depends on following globals:
 * 
 * $i18nResources 
 * $overrideLang
 */

class Translator {
	private static $resources;
	private static $currentLang;
	
	private static $supportedLangs = array('de', 'en', 'it');
	
	public static function findLanguage() {
		global $i18nResources;
		global $overrideLang;
		
		if (isset($overrideLang)) {
			$lang = $overrideLang;
		}
		else {
			$lang = self::getCurrentLanguage();
		}
		
		if (array_key_exists($lang, $i18nResources)) {
			self::$resources = $i18nResources[$lang];
			self::$currentLang = $lang;
		}
		else {
			throw new Exception('Unsupported language: ' . $lang . '.');
		}
    }
	
	private static function getCurrentLanguage() {
		$lang = '';
		
		$pageUrl = $_SERVER['REQUEST_URI'];
		
		foreach (self::$supportedLangs as $supportedLang) {
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
	
	public static function translate($resId) {
        return self::$resources[$resId];
	}
	
	public static function lang() {
		return self::$currentLang;
    }
	
	public static function slug() {
		return self::$currentLang;
    }
}

function t($resId) {
	echo Translator::translate($resId);
}

function lang() {
	echo Translator::lang();
}

function slug() {
	echo Translator::slug();
}

Translator::findLanguage();
