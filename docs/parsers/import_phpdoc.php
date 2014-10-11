<?php

mb_internal_encoding("UTF-8");

require 'libs/PHPDocImporter.php';

// 1. Path to docs/en
// 2. Path to phpdaemon
if(!isset($argv[1]) || !isset($argv[2])) {
	die('Args?');
}

$PHPDocImporter = new PHPDocImporter;
array_shift($argv);
echo $PHPDocImporter->parse($argv);