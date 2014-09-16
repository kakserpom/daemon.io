<?php

spl_autoload_register(function($class_name) {
	$filepath = __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', '/', $class_name) . '.php';
	if(!file_exists($filepath)) {
		return false;
	}

	require $filepath;
});

class PHPDocImporter {
	protected $flagFileChanged = false;

	protected $tags = [
		'namespace' => [
			'open'    => '<!-- include-namespace',
			'openEnd' => '-->',
			'close'   => '<!--/ include-namespace -->'
		]
	];

	protected $tagsRegex = [];

	public function __construct() {
		foreach ($this->tags as $tagKey => $tagType) {
			foreach ($tagType as $tagTypeKey => $tagTypeVal) {
				$this->tagsRegex[$tagKey][$tagTypeKey] = preg_quote($tagTypeVal, '/');
			}
		}
	}

	public function parse($doc_path, $phd_path) {
		// @todo test => prod
		// $mdfiles = glob($doc_path . '/*/*.md', GLOB_NOSORT);
		$mdfiles = glob($doc_path . '/structures/object-storage.md', GLOB_NOSORT);

		foreach ($mdfiles as $mdpath) {
			$this->parseFile($mdpath);
		}
	}

	public function parseFile($mdpath) {
		$this->flagFileChanged = false;
		$content = file_get_contents($mdpath);

		// последовательный парсинг тегов
		$this->tagNamespaceRegex($content);

		if($this->flagFileChanged) {
			// @todo test => prod
			// file_put_contents($mdpath, $content, LOCK_EX);
			file_put_contents(str_replace('object-storage.md', 'object-storage-new.md', $mdpath), $content, LOCK_EX);
		}
	}

	protected function tagNamespaceRegex(&$content) {
		$regex = '/(?P<start>^|\s+)'
			. $this->tagsRegex['namespace']['open']
			. ' (.+?)'
			. $this->tagsRegex['namespace']['openEnd']
			. '(?:(.+?)'
			. $this->tagsRegex['namespace']['close']
			. ')?/ims';

		$content = preg_replace_callback($regex, [$this, 'tagNamespace'], $content);
	}

	protected function tagNamespace($matches) {
		$params = $this->parseTagParams($matches[2]);
		$isActual = $this->isCommitActual($params['path'], $params['commit']);

		// commit прежний
		if($isActual) {
			return $matches[0];
		}

		// ставим флаг что контент будет изменен
		$this->flagFileChanged = true;

		// парсим все данные и записываем в файл
		$content = '';
		$content .= $this->getDocConstants($params['path']);
		$content .= $this->getDocProperties($params['path']);
		$content .= $this->getDocMethods($params['path']);

		return $matches['start']
			. $this->tags['namespace']['open']
			. ' '
			. $this->paramsToStr($params)
			. ' '
			. $this->tags['namespace']['openEnd']
			. "\n"
			. $content
			. "\n"
			. $this->tags['namespace']['close'];
	}

	protected function parseTagParams($str) {
		$params = [
			'path' => false,
			'commit' => false
		];

		preg_match_all('/([a-z]+)\=\"(.*?)\"/i', $str, $matches, PREG_SET_ORDER);
		foreach ($matches as $match) {
			$params[$match[1]] = $match[2];
		}
		return $params;
	}

	protected function isCommitActual($sourcepath, $commit) {
		// @todo
		return false;
	}

	protected function paramsToStr($params) {
		$out = [];
		foreach ($params as $key => $value) {
			$out[] = $key . '="' . (is_string($value) ? $value : '') . '"';
		}
		return implode(' ', $out);
	}


	protected function getDocConstants($sourcepath) {

	}

	protected function getDocProperties($sourcepath) {

	}

	protected function getDocMethods($sourcepath) {

	}
}