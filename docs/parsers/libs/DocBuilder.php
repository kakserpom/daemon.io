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
		return preg_replace_callback('/(\{([\w-]+)(?:[ \t]([^}]+))?\})/', function($matches) {
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
			$text = $matches[1];
			if(substr(ltrim($text),0,3) === '/**') {
				$text = $this->parseMdConstantsFromPHPDoc($text);
			}

			return $this->parseMdConstantsDef($text);
		}, $source);
	}

	/**
	 * Парсит описание константы из phpdoc в стандартизованный вид для дальнейшей обработки
	 * @param  string $text
	 * @return string
	 */
	protected function parseMdConstantsFromPHPDoc($text) {
		$lines = $this->getTextLines($text);

		$code = trim(array_pop($lines));
		$comment = implode("\n", $lines);

		$PHPDoc = new DocBlock($comment);

		$desc_text_arr = preg_split('/[ \t]*\n[ \t]*/', trim($PHPDoc->getShortDescription() ."\n". $PHPDoc->getLongDescription()), -1, PREG_SPLIT_NO_EMPTY);
		$desc_text = implode("  \n", $desc_text_arr);

		return $code ."\n". $desc_text;
	}

	/**
	 * Парсит станлартизованныое описание константы в md
	 * @param  string $text
	 * @return string
	 */
	protected function parseMdConstantsDef($text) {
		$result = '';
		$lines = $this->getTextLines($text);

		if(count($lines) === 0 or (count($lines) === 1 and $lines[0] === '')) {
			return ' -.method.fake &nbsp;';
		}

		if(count($lines)) {
			$part = array_shift($lines);
			$result .= " -.method ```php:p.inline\n $part\n ```\n";
		}

		if(count($lines)) {
			$part = array_shift($lines);
			$result .= ' <ul><li class="n">' . $part . "</li></ul>\n";
		}

		return $result;
	}

	/**
	 *  Парсер тега md:prop
	 */
	protected function parseMdProperties($source) {
		return preg_replace_callback('/^<md:prop>(.+?)<\/md:prop>/ims', function($matches) {
			$text = $matches[1];
			if(substr(ltrim($text),0,3) === '/**') {
				$text = $this->parseMdPropertieFromPHPDoc($text);
			}

			return $this->parseMdPropertieDef($text);
		}, $source);
	}

	/**
	 * Парсит описание свойства из phpdoc в стандартизованный вид для дальнейшей обработки
	 * @param  string $text
	 * @return string
	 */
	protected function parseMdPropertieFromPHPDoc($text) {
		$lines = $this->getTextLines($text, '/\n/', false);
		$phpdoc = [];

		while(true) {
			$line = array_shift($lines);
			if(is_null($line)) {
				break;
			}

			$phpdoc[] = $line;
			if(preg_match('/^[ \t]*\*\//', $line)) {
				break;
			}
		}

		$code = implode("\n", $lines);
		$comment = implode("\n", $phpdoc);

		$PHPDoc = new DocBlock($comment);

		$doc_var = $PHPDoc->getTagsByName('var');

		if(empty($doc_var)) {
			return $code ."\n". $PHPDoc->getText();
		}

		$tag = $doc_var[0];

		$type = $tag->getType();
		$deftype = $this->getDocDefaultType($type);
		$desc = $tag->getDescription();

		if(!$desc) {
			$desc = $PHPDoc->getText();
		}

		return $deftype .' '. $code ."\n". $desc;
	}

	/**
	 * Парсит станлартизованныое описание свойства в md
	 * @param  string $text
	 * @return string
	 */
	protected function parseMdPropertieDef($text) {
		$result = '';
		$lines = $this->getTextLines($text, '/\n/', false);

		if(count($lines) === 0 or (count($lines) === 1 and $lines[0] === '')) {
			return ' -.method.fake &nbsp;';
		}

		if(strpos($lines[0], ' = [') !== false || strpos($lines[0], ' = array (') !== false) {
			$codes = [];
			while (true) {
				$line = array_shift($lines);
				if(is_null($line)) {
					break;
				}

				$codes[] = $line;

				if(strpos($line, ']') !== false || strpos($line, ')') !== false) {
					break;
				}
			}

			$text = implode("\n", $lines);
			$text = preg_replace('/\n+/', "\n", $text);

			$code = implode("\n  \t", $codes);
			$code = preg_replace('/\n[ \t]+\]/', "\n]", $code);

			$result .= " -.method ```php:p.inline\n $code\n ```\n";
			$result .= $text ? ' <ul><li class="n">' . $text . "</li></ul>\n" : '';
		}
		else {
			$part = array_shift($lines);
			$result .= " -.method ```php:p.inline\n $part\n ```\n";

			if(count($lines)) {
				$part = array_shift($lines);
				$result .= ' <ul><li class="n">' . $part . "</li></ul>\n";
			}
		}

		return $result;
	}

	/**
	 *  Парсер тега md:method
	 */
	protected function parseMdMethods($source) {
		return preg_replace_callback('/^<md:method>(.+?)<\/md:method>/ims', function($matches) {
			$text = $matches[1];
			if(substr(ltrim($text),0,3) === '/**') {
				$text = $this->parseMdMethodFromPHPDoc($text);
			}

			return $this->parseMdMethodDef($text);
		}, $source);
	}

	/**
	 * Парсит описание метода из phpdoc в стандартизованный вид для дальнейшей обработки
	 * @param  string $text
	 * @return string
	 */
	protected function parseMdMethodFromPHPDoc($text) {
		$lines = $this->getTextLines($text);

		$link = '';
		$code = trim(array_pop($lines));

		if(strpos($code, 'link:') === 0) {
			$link = substr($code, 5);
			$code = trim(array_pop($lines));
		}

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

		$doc_result = $PHPDoc->getTagsByName('return');
		$code_return_type = empty($doc_result) ? 'void' : $this->getDocDefaultType($doc_result[0]->getType());

		$doc_params    = $PHPDoc->getTagsByName('param');
		$doc_callbacks = $PHPDoc->getTagsByName('callback');

		$callbacks = [];
		foreach ($doc_callbacks as $cb) {
			list($cb_name, $cb_code) = explode(' ', $cb->getDescription(), 2);
			$callbacks[$cb_name] = $cb_code;
		}

		foreach ($doc_params as $tag) {
			$name = $tag->getVariableName();
			$type = $tag->getType();
			$deftype = $this->getDocDefaultType($type);

			$code_params[] = $deftype .' '. $name . (isset($args[$name]) ? ' = '.$args[$name] : '');

			$extra = '';
			if($deftype === 'callable') {
				if(isset($callbacks[$name])) {
					$extra = "callback {$callbacks[$name]}\n";
				}
			}
			$desc_params[] = $name ."\n". $extra. $tag->getDescription();
		}

		$result = '';

		if($link) {
			$result .= 'link:'. $link ."\n";
		}
		
		// $desc_text_arr = preg_split('/[ \t]*\n[ \t]*/', trim($PHPDoc->getShortDescription() ."\n". $PHPDoc->getLongDescription()), -1, PREG_SPLIT_NO_EMPTY);
		// $desc_text = '   ' . implode("  \n   ", $desc_text_arr);
		$desc_text = $this->convertTextToHTML(trim($PHPDoc->getShortDescription() . "\n\n" . $PHPDoc->getLongDescription()));

		$doc_methods = $PHPDoc->getTagsByName('call');

		if(empty($doc_methods)) {
			$result .= $this->showReturnType($code_return_type) .' '. $code_out_params .' ( '. implode(', ', $code_params) ." )\n\n";
		} else {
			foreach ($doc_methods as $tag) {
				$result .= $tag->getDescription() . "<span style='display:none'>;</span>\n";
			}
			$result .= "\n";
		}

		$result .= $desc_text . "\n\n";
		$result .= implode("\n\n", $desc_params);

		return $result;
	}

	protected function convertTextToHTML($text) {
		// $res = preg_replace('/([^\n])\n([^\n])/', "$1  \n$2", $text);
		// $res = ' ' . preg_replace('/\n/', '<br />', $text);
		$res = preg_replace('/\n{2,}/', "\n", $text);
		$res = str_replace("\n", "  \n", $res);
		$res = preg_replace('/(^|\n)[ \t]+/', '$1', $res);
		return $res;
	}

	protected function showReturnType($type) {
		return $type;
	}

	/**
	 * Парсит станлартизованныое описание метода в md
	 * @param  string $text
	 * @return string
	 */
	protected function parseMdMethodDef($text) {
		$result = '';
		$lines = $this->getTextLines($text, '/\n[ \t]*\n/');

		if(count($lines) === 0 or (count($lines) === 1 and $lines[0] === '')) {
			return ' -.method.fake &nbsp;';
		}

		// 1. php код
		$link = '';
		$code = array_shift($lines);

		if($code && strpos($code, 'link:') === 0) {
			list($link, $code) = explode("\n", $code);
			$link = substr($link, 5);
		}

		if($code) {
			$code = str_replace("\n", "\n ", $code);
			$matches2 = [];
			$code = preg_replace_callback('/(?:^|[ \t])(\S+)[ \t]*\(/', function($matches) use (&$matches2) {
				$matches2 = $matches;
				return " [!:$matches[1]](#./$matches[1]) (";
			}, $code);

			if(!isset($matches2[1])) {
				$matches2[1] = '';
			}

			$attrs = '';
			if($link) {
				$attrs .= '[data-link='. $link .']';
			}

			$result .= " -#{$matches2[1]}.method ```php:p.inline". $attrs ."\n {$code}\n ```\n";
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

			if(count($cells) === 2) {
				$result .= "   -.n{$eclass} `:hc`{$cells[0]}` — " . (strpos($cells[1], 'callback ') === 0 ? ('`:phc`'.$cells[1].'`') : $cells[1]) . "\n";
			} else
			if(count($cells) === 3) {
				$result .= "   -.n{$eclass} `:hc`{$cells[0]}` — `:phc`{$cells[1]}` — {$cells[2]}\n";
			} else {
				$result .= "   -.n{$eclass} `:hc`{$cells[0]}`\n";
			}
		}

		return $result;
	}

	/**
	 * Возвращает настоящий тип переменной
	 * @param  string $type
	 * @return string
	 */
	protected function getDocDefaultType($type) {
		$len = strlen($type);
		if(substr($type, $len - 2, 2) === '[]') {
			return 'array';
		}
		return $type;
	}

	/**
	 * Разбивает строку на массив подстрок
	 * @param  string $text Text
	 * @param  string $sep  Regex
	 * @return array
	 */
	protected function getTextLines($text, $sep = '/\n/', $trim = true) {
		$text = trim($text);
		$text = str_replace("\r\n", "\n", $text);
		$text = str_replace("\r", "\n", $text);

		$lines = preg_split($sep, $text);
		$result = [];

		if(!$trim) {
			return $lines;
		}

		foreach ($lines as $line) {
			$result[] = trim($line);
		}

		return $result;
	}
}