<?php

require_once(TEST_ROOT . '../component/translator.php');

$translator = new Translator();

require_once(TEST_ROOT . 'includes/i18n/en.php');
require_once(TEST_ROOT . 'includes/i18n/it.php');

function t($resId) {
	global $translator;
	echo $translator->translate($resId);
}

function lang() {
	global $translator;
	echo $translator->lang();
}

function slug() {
	global $translator;
	echo $translator->slug();
}
