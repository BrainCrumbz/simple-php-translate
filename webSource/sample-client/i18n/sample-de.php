<?php 

// Assumes that the caller has already defined a $translate variable

Translate::getInstance()->addLanguage('de', array(
	'some unique id' => "Text translated in German",
	'another unique id' => <<< EOS
some 
long 
verbatim 
multiline 
text
EOS
,
	'another id' => "Another German translation",
));
