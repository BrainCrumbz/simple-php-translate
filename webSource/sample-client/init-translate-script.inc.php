<?php
/*
 * USAGE: 
 * This script or equivalent one should be placed at the beginning of
 * a page where you plan to use SimplePhpTranslate.
 */

require_once('/component/translator.php');

$translator = new Translator();

require_once('/sample-client/i18n/sample-de.php');
require_once('/sample-client/i18n/sample-en.php');
require_once('/sample-client/i18n/sample-it.php');

$translator->findLanguage();

function t($resId) {
	echo $translator->translate($resId);
}

function lang() {
	echo $translator->lang();
}

function slug() {
	echo $translator->slug();
}
