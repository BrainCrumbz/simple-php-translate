<?php
/*
 * USAGE: 
 * This script or equivalent one should be placed at the beginning of
 * a page where you plan to use SimplePhpTranslate.
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

require_once('/sample-client/i18n/sample-de.php');
require_once('/sample-client/i18n/sample-en.php');
require_once('/sample-client/i18n/sample-it.php');

require_once('/component/translator.php');
