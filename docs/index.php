<?php

require 'AcceptLanguage.php';

foreach (glob(__DIR__ . '/*/language') as $filename) {
	var_dump(dirname($filename));
}

var_dump(\Teto\HTTP\AcceptLanguage::detect());
var_dump(\Teto\HTTP\AcceptLanguage::get());
var_dump(\Teto\HTTP\AcceptLanguage::getLanguages());
var_dump(\Teto\HTTP\AcceptLanguage::parse());