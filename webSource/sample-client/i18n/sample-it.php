<?php 

// Assumes that the caller has already defined a $translator variable

$translator->addLanguage('it', array(
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
