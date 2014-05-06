<?php 
/**
  * Sample script showing how to add translated resources for a language. 
  *
  * This script assumes that caller has already included Translate component.
  *
  * @author  BrainCrumbz <team@braincrumbz.com>
  */

Translate::getInstance()->addLanguage('it', array(
	'some unique id' => "Text translated in Italian",
	'another unique id' => <<< EOS
some 
long 
verbatim 
multiline 
text
EOS
,
	'another id' => "Another Italian translation",
));
