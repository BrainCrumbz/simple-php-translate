<?php
/*
 * USAGE: 
 * This script or equivalent one should be placed at the beginning of
 * a page using SimplePhpTranslate.
 * 
 * NOTE: 
 * this script must declare the following globals:
 * 
 * $i18nResources 
 * 
 * and can declare the following optional globals:
 * 
 * $overrideLang
 */

$i18nResources = array();

require_once(TEST_ROOT . 'includes/i18n/en.php');
require_once(TEST_ROOT . 'includes/i18n/it.php');

require_once(TEST_ROOT . '../component/translator.php');
