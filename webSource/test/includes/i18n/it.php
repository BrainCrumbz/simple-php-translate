<?php 

Translate::getInstance()->addLanguage('it', array(
    'some-page title' => "Una pagina di esempio in Italiano",
	'some-page header' => "Una pagina d&rsquo;esempio, in Italiano",
	'some-page lead' => "I contenuti di questa pagina provengono da risorse di testo tradotte in lingua",
	'some-page content' => "Ecco il <em>contenuto principale</em> di questa pagina",
	'some-page more content' => <<< EOS
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. 
Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, 
pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. 
EOS
	,
	'some-page switch text' => "Passa all&rsquo;altra lingua",
	'some-page switch url' => "../en",
    'some-page look attribute' => "In aggiunta, dai un&rsquo;occhiata nei sorgenti della pagina all&rsquo;attributo <code>lang</code> dell&rsquo;elemento <code>html</code>.",
    'some-page go to another' => "Vai verso un&rsquo;altra pagina",

    'another-page title' => "Altra pagina di esempio in Italiano",
	'another-page header' => "Un&rsquo;altra pagina d&rsquo;esempio",
	'another-page lead' => "Ancora in Italiano",
	'another-page content' => "Anche i contenuti di questa pagina provengono da risorse di testo tradotte.",
	'another-page switch text' => "Cambia lingua",
	'another-page switch url' => "../en",

	'common test home' => "Vai alla home",
	'common meta description' => "Pagina di test del progetto Simple PHP Translate",
	'common footer' => <<< EOS
Condiviso con &#x2764; da <a href='http://www.braincrumbz.com' target='_blank' rel='nofollow'>BrainCrumbz</a>, 2014.
EOS
	,
));
