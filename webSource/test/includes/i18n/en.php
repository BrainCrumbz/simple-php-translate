<?php 

Translate::getInstance()->addLanguage('en', array(
    'some-page title' => "Some example page in English",
	'some-page header' => "Some example page, in English",
	'some-page lead' => "This page contents are coming from translated text resources.",
	'some-page content' => "Here is the <em>main content</em> of this page.",
	'some-page more content' => <<< EOS
The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. 
Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. 
Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack. Quick wafting zephyrs vex bold Jim. 
EOS
	,
	'some-page switch text' => "Switch to the other language",
	'some-page switch url' => "../it",
    'some-page look attribute' => "Also, please have a look at the <code>html lang</code> attribute from this page source.",
    'some-page go to another' => "Go to another page",

    'another-page title' => "Anoher example page in English",
	'another-page header' => "Another example page",
	'another-page lead' => "Still in English",
	'another-page content' => "This page contents are also coming from translated text resources.",
    'another-page picture' => "The <code>src</code> attribute of this image also changes with page language: ",
	'another-page switch text' => "Change language",
	'another-page switch url' => "../it",
  
    'manual-page title' => "Page with manually set language",
    'manual-page header' => "Page with manually set language",
	'manual-page lead' => "Language set is English",
	'manual-page content' => <<< EOS
This page contents are coming from translated text resources. <hr/>
Last URL portion is not needed in order to work with SimplePhpTranslate component. 
That is only related to the way these test pages are organized.
EOS
    ,

	'common test home' => "Test home",
	'common meta description' => "Test page for Simple PHP Translate project",
	'common footer' => <<< EOS
Shared with &#x2764; by <a href='http://www.braincrumbz.com' target='_blank' rel='nofollow'>BrainCrumbz</a>, 2014.
EOS
	,
));
