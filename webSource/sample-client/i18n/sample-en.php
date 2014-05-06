<?php 
/**
  * Sample script showing how to add translated resources for a language. 
  *
  * This script assumes that caller has already included Translate component.
  *
  * @author  BrainCrumbz <team@braincrumbz.com>
  */

Translate::getInstance()->addLanguage('en', array(
	'some unique id' => "Text translated in English",
	'another unique id' => <<< EOS
some 
long 
verbatim 
multiline 
text
EOS
,
	'another id' => "Another English translation",
));
