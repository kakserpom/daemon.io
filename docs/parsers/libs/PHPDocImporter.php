<?php

spl_autoload_register(function($class_name) {
	$filepath = __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', '/', $class_name) . '.php';
	if(!file_exists($filepath)) {
		return false;
	}

	require $filepath;
});

class PHPDocImporter {
	public function parse($doc_path, $phd_path) {
		$files = glob($doc_path . '/*/*.md', GLOB_NOSORT);

		foreach ($files as $filpath) {
			$this->parseFile($filpath);
		}
	}

	public function parseFile($filpath) {
		
	}
}