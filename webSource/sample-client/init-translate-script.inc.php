<?php
/**
  * Sample script showing how to work with SimplePhpTranslate component.
  *
  * This script or equivalent one should be placed at the beginning of
  * each page where you plan to use translated resources.
  *
  * @author  BrainCrumbz <team@braincrumbz.com>
  */

/*
 * Include main SimplePhpTranslate component.
 * This will take care of definining needed classes, instances, helper functions.
 */
require_once('/component/translate.php');

/*
 * Adds translated resources for each language. 
 * Resources could be added straight in this file, it's not mandatory to add them
 * from separate files, but it's easier to organize them if each language has its
 * own resource file.
 */
require_once('/sample-client/i18n/sample-de.php');
require_once('/sample-client/i18n/sample-en.php');
require_once('/sample-client/i18n/sample-it.php');
