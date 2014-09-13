<?php

spl_autoload_register(function($class_name) {
	$filepath = __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', '/', $class_name) . '.php';
	if(!file_exists($filepath)) {
		return false;
	}

	require $filepath;
});

require 'Parsedown.php';
require 'ParsedownExtra.php';
require 'ParsedownCustom.php';

use phpDocumentor\Reflection\DocBlock as DocBlock;

class DocBuilder {

	/**
	 * @var string Шаблон
	 */
	public $template;

	/**
	 * @var string Путь до исходного файла
	 */
	public $source_path;

	/**
	 * @var string Текст
	 */
	public $markdown;

	/**
	 * @var string Готовый html
	 */
	public $html;

	/**
	 * @var array Ассоциативный массив констант проекта
	 */
	protected $consts;

	/**
	 * Сборка проекта
	 * @param  string $source_path Путь до исходного файла
	 * @return string
	 */
	public function build($source_path, $template_path) {
		$this->source_path = $source_path;
		$this->markdown = file_get_contents($this->source_path);

		$template_path = realpath($template_path);
		if(!$template_path) {
			throw new Exception("Template not exist");
		}

		$this->template = file_get_contents($template_path);

		// 1. Склейка всех файлов
		$this->markdown = $this->importFiles($this->markdown, $this->source_path);

		// 2. Парсинг констант проекта
		$this->markdown = $this->parseVars($this->markdown);

		// 3. Парсинг шаблонов
		$this->markdown = $this->parseTpls($this->markdown);
		$this->template = $this->parseTpls($this->template);

		// 4. Парсинг <md: />
		$this->markdown = $this->parseMdConstants($this->markdown);
		$this->markdown = $this->parseMdProperties($this->markdown);
		$this->markdown = $this->parseMdMethods($this->markdown);

		// 5. Парсинг markdown
		$Parsedown = new ParsedownCustom();
		$this->markdown = $Parsedown->text($this->markdown);

		// 6. Постобработка
		// @todo

		$this->html = str_replace([
			'<!-- title -->',
			'<!-- toc -->',
			'<!-- main_content -->',
			'<!-- block_langs -->'
		], [
			isset($this->consts['title']) ? $this->consts['title'] : '',
			$Parsedown->generateNavigate(),
			$this->markdown,
			$this->parseLangs()
		],
			$this->template
		);

		return $this->html;
	}

	/**
	 * Склейка всех файлов в один
	 * @param  string $content  Текст
	 * @param  string $source_path Путь до текущего файла
	 * @return string
	 */
	protected function importFiles($content, $source_path) {
		$currdir = dirname(realpath($source_path));
		return preg_replace_callback('/\<\!-- import (.+?) --\>/i', function($matches) use ($currdir) {
			$source_path = $currdir . DIRECTORY_SEPARATOR . $matches[1];
			if(!file_exists($source_path)) {
				return '';
			}
			$content = file_get_contents($source_path);
			$content = $this->importFiles($content, $source_path);
			return $content;
		}, $content);
	}

	/**
	 * Парсит константы проекта
	 * <!-- pvar key value любой длины -->
	 * @param  string $source Исходный текст
	 * @return string
	 */
	protected function parseVars($source) {
		return preg_replace_callback('/(?:[ \t]*)<!--[ \t]+pvar[ \t]+([\w-]+)[ \t]+(.+?)[ \t]+-->(?:\n*)/i', function($matches) {
			$this->consts[$matches[1]] = $matches[2];
			return '';
		}, $source);
	}

	/**
	 * Парсинг шаблонов
	 * @param  string $source Исходный текст
	 * @return string
	 */
	protected function parseTpls($source) {
		return preg_replace_callback('/(\{([\w-]+)(?:\s([^}]+))?\})/', function($matches) {
			$key = $matches[2];

			if(!isset($this->consts[$key])) {
				return $matches[1];
			}

			if(!isset($matches[3])) {
				return $this->consts[$key];
			}

			$value = $this->consts[$key];
			$count = substr_count($value, '%s');

			if(!$count) {
				return $value;
			}

			$values = explode(' ', $matches[3], $count);

			if(count($values) < $count) {
				$values = array_merge($values, array_fill(0, $count - count($values), ''));
			}

			return vsprintf($value, $values);
		}, $source);
	}

	/**
	 * Парсинг доступных языковых версий
	 * @return string
	 */
	protected function parseLangs() {
		$currpath = dirname(realpath($this->source_path));
		$rootpath = dirname($currpath);
		$currlangpath = basename($currpath);
		$result = '';

		foreach (glob($rootpath . '/*/language') as $filename) {
			$classes = '';
			$langname = file_get_contents($filename);
			$langcode = basename(dirname($filename));

			if($langcode === $currlangpath) {
				$classes = ' class="active"';
			}

			$result .= "<li{$classes}><a href=\"/docs/{$langcode}/\">{$langname}</a></li>";
		}

		return $result;
	}

	/**
	 *  Парсер тега md:const
	 */
	protected function parseMdConstants($source) {
		return preg_replace_callback('/^<md:const>(.+?)<\/md:const>/ims', function($matches) {
			$result = '';
			$lines = $this->getTextLines($matches[1]);

			if(count($lines) === 0 or (count($lines) === 1 and $lines[0] === '')) {
				return ' -.method.fake &nbsp;';
			}

			if(count($lines)) {
				$part = array_shift($lines);
				$result .= "-.method ```php:p.inline\n $part\n ```\n";
			}

			if(count($lines)) {
				$part = array_shift($lines);
				$result .= ' ' . $part . "\n";
			}

			return $result;
		}, $source);
	}

	/**
	 *  Парсер тега md:prop
	 */
	protected function parseMdProperties($source) {
		return preg_replace_callback('/^<md:prop>(.+?)<\/md:prop>/ims', function($matches) {
			$result = '';
			$lines = $this->getTextLines($matches[1]);

			if(count($lines) === 0 or (count($lines) === 1 and $lines[0] === '')) {
				return ' -.method.fake &nbsp;';
			}

			if(count($lines)) {
				$part = array_shift($lines);
				$result .= "-.method ```php:p.inline\n $part\n ```\n";
			}

			if(count($lines)) {
				$part = array_shift($lines);
				$result .= ' ' . $part . "\n";
			}

			return $result;
		}, $source);
	}

	/**
	 *  Парсер тега md:method
	 */
	protected function parseMdMethods($source) {
		return preg_replace_callback('/^<md:method>(.+?)<\/md:method>/ims', function($matches) {
			$text = $matches[1];
			if(substr(ltrim($text),0,3) === '/**') {
				$text = $this->parseMdMethodsNew($text);
			}

			return $this->parseMdMethodsOld($text);
		}, $source);
	}

	protected function parseMdMethodsNew($text) {
		$lines = $this->getTextLines($text);

		$code = trim(array_pop($lines));
		$code_out_params = trim(substr($code, 0, strpos($code, '(')));
		$comment = implode("\n", $lines);

		$args = [];
		preg_match_all('/(\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\s*\=\s*(.+?)(\,|\))/', $code, $matches, PREG_SET_ORDER);
		foreach ($matches as $matche) {
			$args[$matche[1]] = $matche[2];
		}

		$code_params = [];
		$desc_params = [];
		$PHPDoc = new DocBlock($comment);

		$doc_result = $PHPDoc->getTagsByName('result');
		$code_return_type = empty($params_result) ? 'void' : $params_result[0]->getType();

		$cbi = 0;
		$doc_params    = $PHPDoc->getTagsByName('param');
		$doc_callbacks = $PHPDoc->getTagsByName('callback');
		foreach ($doc_params as $tag) {
			$varname = $tag->getVariableName();
			$code_params[] = $tag->getType() .' '. $varname . (isset($args[$varname]) ? ' = '.$args[$varname] : '');

			$extra = '';
			if($tag->getType() === 'callable') {
				if(isset($doc_callbacks[$cbi])) {
					$extra = "callback {$doc_callbacks[$cbi]->getDescription()}\n";
				}
				
				$cbi++;
			}
			$desc_params[] = $tag->getVariableName() ."\n". $extra. $tag->getDescription();
		}

		$desc_text_arr = preg_split('/\s*\n\s*/', trim($PHPDoc->getShortDescription() ."\n". $PHPDoc->getLongDescription()), -1, PREG_SPLIT_NO_EMPTY);
		$desc_text = implode("  \n", $desc_text_arr);

		$result = $code_return_type .' '. $code_out_params .' ( '. implode(', ', $code_params) ." )\n\n";
		$result .= $desc_text . "\n\n";
		$result .= implode("\n\n", $desc_params);
		
		return $result;
	}

	protected function parseMdMethodsOld($text) {
		$result = '';
		$lines = $this->getTextLines($text, '/\n[\s]*\n/');

		if(count($lines) === 0 or (count($lines) === 1 and $lines[0] === '')) {
			return ' -.method.fake &nbsp;';
		}

		// 1. php код
		$code = array_shift($lines);

		if($code) {
			$code = str_replace("\n", "\n ", $code);
			$matches2 = [];
			$code = preg_replace_callback('/(?:^|\s)([^\s]+)\s\(/', function($matches) use (&$matches2) {
				$matches2 = $matches;
				return " [!:$matches[1]](#./$matches[1]) (";
			}, $code, 1);

			if(!isset($matches2[1])) {
				$matches2[1] = '';
			}

			$result .= " -#{$matches2[1]}.method ```php:p.inline\n {$code}\n ```\n\n";
		}

		# 2. Описание
		$desc = array_shift($lines);

		if($desc) {
			$result .= "   -.n {$desc}\n";
		}

		# 3. Переменные
		$i = 0;
		foreach ($lines as $line) {
			$cells = explode("\n", $line);

			if($i++ == 0) {
				$eclass = '.ti';
			} else {
				$eclass = '';
			}

			if(count($cells) === 3) {
				$result .= "   -.n{$eclass} `:hc`{$cells[0]}` — `:phc`{$cells[1]}` — {$cells[2]}\n";
			} else {
				$result .= "   -.n{$eclass} `:hc`{$cells[0]}` — {$cells[1]}\n";
			}
		}

		return $result;
	}

	protected function getTextLines($text, $sep = '/\n/') {
		$text = trim($text);
		$text = str_replace("\r\n", "\n", $text);
		$text = str_replace("\r", "\n", $text);

		$lines = preg_split($sep, $text);
		$result = [];
		foreach ($lines as $line) {
			$result[] = trim($line);
		}

		return $result;
	}
}