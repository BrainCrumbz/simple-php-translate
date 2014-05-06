<?php 

// Assumes that the caller has already defined a $translator variable

$translator->addLanguage('en', array(
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
