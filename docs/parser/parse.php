<?php

mb_internal_encoding("UTF-8");

require 'DocBuilder.php';

if(!isset($argv[1]) || !file_exists($argv[1])) {
	die('No source file');
}

$DocBuilder = new DocBuilder;
echo $DocBuilder->build($argv[1], __DIR__ .'/../template.html');
