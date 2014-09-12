<?php

class ParsedownCustom extends ParsedownExtra
{
	protected $navigate = [];

	/**
	 * @var array Цепочка заголовков
	 */
	protected $headers_stack = [];

	/**
	 * @var array Цепочка id заголовков
	 */
	protected $headers_id_stack = [];

	/**
	 * @var array Цепочка path заголовков
	 */
	protected $header_path_stack = [];

	public static $fromLower = Array("э", "ч", "ш", "ё", "ё", "ж", "ю", "ю", "я", "я", "а", "б", "в", "г", "д", "е", "з", "и", "й", "к", "л", "м", "н", "о", "п", "р", "с", "т", "у", "ф", "х", "ц", "щ", "ъ", "ы", "ь");
	public static $toLower = Array("e", "ch", "sh", "yo", "jo", "zh", "yu", "ju", "ya", "ja", "a", "b", "v", "g", "d", "e", "z", "i", "j", "k", "l", "m", "n", "o", "p", "r", "s", "t", "u", "f", "h", "c", "w", "", "y", "");

	/**
	 * Построчный парсинг документа
	 * Добавлена обработка ссылок parseRelativeLinks
	 * @param  array  $lines
	 * @return string
	 */
	protected function lines(array $lines)
	{
		$CurrentBlock = null;

		foreach ($lines as $line)
		{
			if (chop($line) === '')
			{
				if (isset($CurrentBlock))
				{
					$CurrentBlock['interrupted'] = true;
				}

				continue;
			}

			$indent = 0;

			while (isset($line[$indent]) and $line[$indent] === ' ')
			{
				$indent ++;
			}

			$text = $indent > 0 ? substr($line, $indent) : $line;

			# ~

			$Line = array('body' => $line, 'indent' => $indent, 'text' => $text);

			# ~
			# 
			$this->parseRelativeLinks($CurrentBlock);

			if (isset($CurrentBlock['incomplete']))
			{
				$Block = $this->{'addTo'.$CurrentBlock['type']}($Line, $CurrentBlock);

				if (isset($Block))
				{
					$CurrentBlock = $Block;

					continue;
				}
				else
				{
					if (method_exists($this, 'complete'.$CurrentBlock['type']))
					{
						$CurrentBlock = $this->{'complete'.$CurrentBlock['type']}($CurrentBlock);
					}

					unset($CurrentBlock['incomplete']);
				}
			}

			# ~

			$marker = $text[0];

			if (isset($this->DefinitionTypes[$marker]))
			{
				foreach ($this->DefinitionTypes[$marker] as $definitionType)
				{
					$Definition = $this->{'identify'.$definitionType}($Line, $CurrentBlock);

					if (isset($Definition))
					{
						$this->Definitions[$definitionType][$Definition['id']] = $Definition['data'];

						continue 2;
					}
				}
			}

			# ~

			$blockTypes = $this->unmarkedBlockTypes;

			if (isset($this->BlockTypes[$marker]))
			{
				foreach ($this->BlockTypes[$marker] as $blockType)
				{
					$blockTypes []= $blockType;
				}
			}

			#
			# ~

			foreach ($blockTypes as $blockType)
			{
				$Block = $this->{'identify'.$blockType}($Line, $CurrentBlock);

				if (isset($Block))
				{
					$Block['type'] = $blockType;

					if ( ! isset($Block['identified']))
					{
						$Elements []= $CurrentBlock['element'];

						$Block['identified'] = true;
					}

					if (method_exists($this, 'addTo'.$blockType))
					{
						$Block['incomplete'] = true;
					}

					$CurrentBlock = $Block;

					continue 2;
				}
			}

			# ~

			if (isset($CurrentBlock) and ! isset($CurrentBlock['type']) and ! isset($CurrentBlock['interrupted']))
			{
				$CurrentBlock['element']['text'] .= "\n".$text;
			}
			else
			{
				$Elements []= $CurrentBlock['element'];

				$CurrentBlock = $this->buildParagraph($Line);

				$CurrentBlock['identified'] = true;
			}
		}

		# ~

		if (isset($CurrentBlock['incomplete']) and method_exists($this, 'complete'.$CurrentBlock['type']))
		{
			$CurrentBlock = $this->{'complete'.$CurrentBlock['type']}($CurrentBlock);
		}

		# ~

		$Elements []= $CurrentBlock['element'];

		unset($Elements[0]);

		# ~

		$markup = $this->elements($Elements);

		# ~

		return $markup;
	}

	/**
	 * Парсим все ссылки вида #./ и #../ в массиве блока
	 * @param  array $CurrentBlock
	 */
	protected function parseRelativeLinks(&$CurrentBlock) {
		$this->trace($CurrentBlock, 'parseRelativeLinksDo');
	}

	/**
	 * Рекурсивный проход по всем значниям массива с выполнением $callback метода
	 * @param  array  $arr
	 * @param  string $callback
	 */
	protected function trace(&$arr, $callback) {
		if(!is_array($arr)) {
			return;
		}

		foreach ($arr as $key => &$el) {
			if (is_array($el)) {
				$this->trace($el, $callback);
			} else
			if(is_int($key) || $key === 'text') {
				$this->$callback($el);
			}
		}
	}

	/**
	 * Парсим все ссылки вида #./ и #../ в строке
	 * @param  [type] $text [description]
	 * @return [type]       [description]
	 */
	protected function parseRelativeLinksDo(&$text) {
		$text = preg_replace_callback('/\]\(\#[\.\/]+(.*?)\)/', function($matches) {
			$href = trim($matches[0], ']()');
			$postfix = $matches[1];
			$stack = $this->headers_id_stack;

			if($href[1] === '.' && $href[2] === '/') {
				if($postfix) {
					$stack[] = $postfix;
				}
				return '](#'. implode('/', $stack) .')';
			}

			if($href[1] === '.' && $href[2] === '.' && $href[3] === '/') {
				$n = (strlen($href) - strlen($postfix) - 1) / 3;
				for($i = 0; $i < $n; ++$i) {
					array_pop($stack);
				}
				if($postfix) {
					$stack[] = $postfix;
				}
				return '](#'. implode('/', $stack) .')';
			}

			return $matches[0];
		}, $text);
	}

	/**
	 * Сложная обработка заголовков. Составление навигации
	 * @param  array $Line
	 * @return array
	 */
	protected function identifyAtx($Line, $CurrentBlock)
	{
		preg_match('/^(\#{1,6})(\$)?\s+/', $Line['text'], $matches);

		$n = strlen($matches[1]);
		$isSimple = isset($matches[2]) && $matches[2] === '$';

		$match1len = isset($matches[1]) ? strlen($matches[1]) : 0;
		$match2len = isset($matches[2]) ? strlen($matches[2]) : 0;
		$text = substr($Line['text'], $match1len + $match2len + 1);
		$parts = preg_split('/\s+\#\>?\s+/', $text, 3, PREG_SPLIT_NO_EMPTY);

		if(empty($parts)) {
			return;
		}

		$header_id = $this->translit($parts[0], '-');
		$header_name = isset($parts[1]) ? $parts[1] : $parts[0];
		$html = isset($parts[2]) ? $parts[2] : $header_name;

		if (!$isSimple) {
			$header_path = $this->addHeader($header_id, $header_name, $n);
		} else {
			$header_path = implode('/', $this->headers_id_stack) ;
			$header_path .= $header_path ? '/'. $header_id : $header_id;
		}
		 
		$stack = $this->headers_stack;
		array_pop($stack);

		if(!$isSimple and count($stack)) {
			$hlinks = [];
			$i = 0;

			foreach($stack as $name) {
				$i += 1;
				$linkarr = [];

				foreach(array_slice($this->headers_id_stack, 0, $i) as $hid) {
					$linkarr[] = $hid;
				}

				$link = implode('/', $linkarr);
				array_unshift($hlinks, "<a href=\"#$link\">$name</a>");
			}

			$header_html = $html . '<span class="header-path"> <i>&larr;</i> ' . implode(' <i>&larr;</i> ', $hlinks) . '</span>';
		} else {
			$header_html = $html;
		}

		return array(
			'element' => array(
				'name' => 'h' . min(6, $n),
				'handler' => 'line',
				'text' => "<div class=\"in anchor\">$header_html</div>",
				'attributes' => [
					'id' => $header_path
				]
			),
		);
	}

	/**
	 * Списки с id и классами
	 * @param  array $Line
	 * @return array
	 */
	protected function identifyList($Line)
	{
		list($name, $pattern) = $Line['text'][0] <= '-' ? array('ul', '[*+-]') : array('ol', '[0-9]+[.]');

		if (preg_match('/^('.$pattern.')(\#[a-zA-Z0-9_\/-]+)?((?:\.[_a-zA-Z0-9-]+)*)[\s]+(.*)/', $Line['text'], $matches))
		{
			$classes = $this->parseClasses($matches[3]);

			$Block = array(
				'indent' => $Line['indent'],
				'pattern' => $pattern,
				'element' => array(
					'name' => $name,
					'handler' => 'elements',
				),
			);

			$Block['li'] = array(
				'name' => 'li',
				'handler' => 'li',
				'text' => array(
					$matches[4],
				),
			);

			if($matches[2]) {
				$id = substr($matches[2], 1);
				$header_path = $this->addHeader($id, $id, '+1', true);

				$Block['li']['attributes']['id'] = $header_path;
				if($classes) $classes .= ' ';
				$classes .= 'anchor';
			}

			if($classes) {
				$Block['li']['attributes']['class'] = $classes;
			}

			$Block['element']['text'] []= & $Block['li'];

			return $Block;
		}
	}

	protected function addToList($Line, array $Block)
	{
		if ($Block['indent'] === $Line['indent'] and preg_match('/^('.$Block['pattern'].')(\#[a-zA-Z0-9_\/-]+)?((?:\.[_a-zA-Z0-9-]+)*)[\s]+(.*)/', $Line['text'], $matches))
		{
			if (isset($Block['interrupted']))
			{
				$Block['li']['text'] []= '';

				unset($Block['interrupted']);
			}

			unset($Block['li']);

			$classes = $this->parseClasses($matches[3]);

			$Block['li'] = array(
				'name' => 'li',
				'handler' => 'li',
				'text' => array(
					$matches[4],
				),
			);

			if($matches[2]) {
				$id = substr($matches[2], 1);
				$header_path = $this->addHeader($id, $id, '+1', true);

				$Block['li']['attributes']['id'] = $header_path;
				if($classes) $classes .= ' ';
				$classes .= 'anchor';
			}

			if($classes) {
				$Block['li']['attributes']['class'] = $classes;
			}

			$Block['element']['text'] []= & $Block['li'];

			return $Block;
		}

		if ( ! isset($Block['interrupted']))
		{
			$text = preg_replace('/^[ ]{0,4}/', '', $Line['body']);

			$Block['li']['text'] []= $text;

			return $Block;
		}

		if ($Line['indent'] > 0)
		{
			$Block['li']['text'] []= '';

			$text = preg_replace('/^[ ]{0,4}/', '', $Line['body']);

			$Block['li']['text'] []= $text;

			unset($Block['interrupted']);

			return $Block;
		}
	}

	/**
	 * В инлайн блоке кода не делаем преобразование символов
	 * @param  array $Excerpt
	 * @return array
	 */
	protected function identifyInlineCode($Excerpt)
	{
		$marker = $Excerpt['text'][0];

		if (preg_match('/^('.$marker.'+)(?:(:[a-z]+)?((?:\.[_a-zA-Z0-9-]+)*)`)?(.+?)(?<!'.$marker.')\1(?!'.$marker.')/', $Excerpt['text'], $matches))
		{
			$text = $matches[4];

			$mods = $this->parseMods($matches[2]);
			$classes = $this->parseClasses($matches[3]);

			$Block = array(
				'extent' => strlen($matches[0]),
				'element' => array(
					'name' => 'code',
					'text' => $text
				)
			);

			// преобразование символов
			if(isset($mods['e'])) {
				$Block['element']['text'] = $text = htmlspecialchars($text, ENT_NOQUOTES, 'UTF-8');
			}

			// парсим ссылки
			if(isset($mods['p'])) {
				$Block['element']['handler'] = ['line_custom', '['];
			}

			if(isset($mods['h'])) {
				if($classes) $classes .= ' ';
				$classes .= 'code_highlight php';
			}

			if(isset($mods['c'])) {
				if($classes) $classes .= ' ';
				$classes .= 'clear';
			}

			if($classes) {
				$Block['element']['attributes'] = [
					'class' => $classes
				];
			}

			return $Block;
		}
	}

	/**
	 * Блок кода с поддержкой языка и классов
	 * @param  array $Line
	 * @return array
	 */
	protected function identifyFencedCode($Line)
	{
		// if (preg_match('/^(['.$Line['text'][0].']{3,})[ ]*([\w-]+)?[ ]*$/', $Line['text'], $matches))
		if(preg_match('/^(['.$Line['text'][0].']{3,})([\w+-]+)?(:[a-z]+)?((?:\.[_a-zA-Z0-9-]+)*)[\s]*$/', $Line['text'], $matches))
		{
			$Element = array(
				'name' => 'code',
				'text' => '',
			);

			if(isset($matches[2])) {
				$Element['attributes'] = array(
					'class' => $matches[2],
				);
			}

			if(isset($matches[3]) && $matches[3]) {
				$mods = $this->parseMods($matches[3]);
				
				// парсим ссылки
				if(isset($mods['p'])) {
					$Element['handler'] = ['line_custom', '['];
				}
			}

			$Block = array(
				'char' => $Line['text'][0],
				'element' => array(
					'name' => 'pre',
					'handler' => 'element',
					'text' => $Element,
				),
			);

			if(isset($matches[4]) && $matches[4]) {
				$Block['element']['attributes'] = [
					'class' => $this->parseClasses($matches[4])
				];
			}

			return $Block;
		}
	}

	/**
	 * В блоке кода не делаем преобразование символов
	 * @param  array $Block
	 * @return array
	 */
	protected function completeFencedCode($Block)
	{
	   return $Block;
	}

	/**
	 * Парсим в строке только ссылки
	 * @param  string $text
	 * @return string
	 */
	public function line_custom($text, $markers)
	{
		$markup = '';

		$remainder = $text;

		$markerPosition = 0;

		// while ($excerpt = strpbrk($remainder, $this->spanMarkerList))
		while ($excerpt = strpbrk($remainder, $markers))
		{
			$marker = $excerpt[0];

			$markerPosition += strpos($remainder, $marker);

			$Excerpt = array('text' => $excerpt, 'context' => $text);

			foreach ($this->SpanTypes[$marker] as $spanType)
			{
				$handler = 'identify'.$spanType;

				$Span = $this->$handler($Excerpt);

				if ( ! isset($Span))
				{
					continue;
				}

				# The identified span can be ahead of the marker.

				if (isset($Span['position']) and $Span['position'] > $markerPosition)
				{
					continue;
				}

				# Spans that start at the position of their marker don't have to set a position.

				if ( ! isset($Span['position']))
				{
					$Span['position'] = $markerPosition;
				}

				$plainText = substr($text, 0, $Span['position']);

				$markup .= $this->readPlainText($plainText);

				$markup .= isset($Span['markup']) ? $Span['markup'] : $this->element($Span['element']);

				$text = substr($text, $Span['position'] + $Span['extent']);

				$remainder = $text;

				$markerPosition = 0;

				continue 2;
			}

			$remainder = substr($excerpt, 1);

			$markerPosition ++;
		}

		$markup .= $this->readPlainText($text);

		return $markup;
	}

	/**
	 * Продвинутая реализация handler
	 * @param  array  $Element
	 * @return string
	 */
	protected function element(array $Element)
	{
		$markup = '<'.$Element['name'];

		if (isset($Element['attributes']))
		{
			foreach ($Element['attributes'] as $name => $value)
			{
				$markup .= ' '.$name.'="'.$value.'"';
			}
		}

		if (isset($Element['text']))
		{
			$markup .= '>';

			if (isset($Element['handler']))
			{
				if(is_array($Element['handler'])) {
					$params = $Element['handler'];
					array_shift($params);
					$params = array_merge([$Element['text']], $params);
					$markup .= call_user_func_array([$this, $Element['handler'][0]], $params);
				}
				else {
					$markup .= $this->$Element['handler']($Element['text']);
				}
			}
			else
			{
				$markup .= $Element['text'];
			}

			$markup .= '</'.$Element['name'].'>';
		}
		else
		{
			$markup .= ' />';
		}

		return $markup;
	}

	protected function identifyLink($Excerpt) {
		$result = parent::identifyLink($Excerpt);

		$text = $result['element']['text'];
		$href = $result['element']['attributes']['href'];

		$mode_clear = false;

		if($text[0] === '!' && $text[1] === ':') {
			$mode_clear = true;
			$result['element']['text'] = $text = substr($text, 2);
		}

		// <a target="_self" class="tpl-inlink" href="#%s">%s<i class="fa fa-caret-square-o-up"></i></a>
		if($href[0] === '#') {
			$result['element']['text'] .= '<i class="fa fa-caret-square-o-up"></i>';
			$result['element']['attributes']['class'] = 'tpl-inlink';
		} else
		// <a target="_blank" class="tpl-git" href="https://github.com/kakserpom/phpdaemon/tree/master/%s">%s<i class="fa fa-github"></i></a>
		if(preg_match('/^[a-z]+\:\/\/github\.com\//i', $href)) {
			if($result['element']['text'] === 'i') {
				$result['element']['text'] = '<i class="fa fa-github"></i>';
				$result['element']['attributes']['class'] = 'tpl-git';
			} else {
				$result['element']['text'] .= '<i class="fa fa-github"></i>';
				$result['element']['attributes']['class'] = 'tpl-git tpl-git-text';
			}
			$result['element']['attributes']['target'] = '_blank';
		} else
		if(preg_match('/^([a-z]+\:\/\/)PHPDaemon\//i', $href, $matches)) {
			if($result['element']['text'] === 'i') {
				$result['element']['text'] = '<i class="fa fa-github"></i>';
				$result['element']['attributes']['class'] = 'tpl-git';
			} else {
				$result['element']['text'] .= '<i class="fa fa-github"></i>';
				$result['element']['attributes']['class'] = 'tpl-git tpl-git-text';
			}
			$result['element']['attributes']['href'] = 'https://github.com/kakserpom/phpdaemon/tree/master/' . substr($href, strlen($matches[1]));
			$result['element']['attributes']['target'] = '_blank';
		} else
		// <a target="_blank" class="tpl-outlink" href="%s">%s<i class="fa fa-external-link"></i></a>
		if(preg_match('/^[a-z]+\:\/\//i', $href)) {
			$result['element']['text'] .= '<i class="fa fa-external-link"></i>';
			$result['element']['attributes']['class'] = 'tpl-outlink';
			$result['element']['attributes']['target'] = '_blank';
		}

		if($mode_clear) {
			$result['element']['text'] = $text;
			if(isset($result['element']['attributes']['class'])) {
				unset($result['element']['attributes']['class']);
			}
		}

		return $result;
	}

	/**
	 * Добавляет заголовок
	 * @param  string $header_id   Строковый ID
	 * @param  string $name        Видимое название
	 * @param  string $deep        Уровень заголовка
	 * @return string $header_path Полный строковый ID
	 */
	protected function addHeader($header_id, $name, $deep = 0, $stop_propagation = false) {
		if($deep[0] === '-') {
			$n = count($this->headers_stack) + 1;
			$n = $n - (int) substr($deep, 1);
		}
		else
		if($deep[0] === '+') {
			$n = count($this->headers_stack) + 1;
			$n = $n + (int) substr($deep, 1);
		}
		else {
			$n = (int) $deep;
		}

		$this->headers_stack = array_slice($this->headers_stack, 0, $n-2);
		$this->headers_id_stack = array_slice($this->headers_id_stack, 0, $n-2);

		$header_path = implode('/', $this->headers_id_stack) ;
		$header_path .= $header_path ? '/'. $header_id : $header_id;

		$pref = $header_path;
		$index = 1;

		while(true) {
			if(!isset($this->header_path_stack[$header_path])) {
				break;
			}
			$header_path = $pref . ++$index;
		}

		$this->header_path_stack[$header_path] = $header_path;
		$this->navigate[] = [$n, $header_path, $name];

		$result = array_merge($this->headers_id_stack, [$header_id . ($index > 1 ? $index : '')]);

		if(!$stop_propagation) {
			$this->headers_stack[] = $name;
			$this->headers_id_stack = $result;
		}

		return implode('/', $result);
	}

	/**
	 * Парсинг модификаторов :a-z
	 * @param  string $data
	 * @return array
	 */
	protected function parseMods($data) {
		return array_flip(preg_split('//', substr($data, 1), -1, PREG_SPLIT_NO_EMPTY));
	}

	/**
	 * Парсинг классов ".class1.class2"
	 * @param  string $data
	 * @return string       "class1 class2"
	 */
	protected function parseClasses($data) {
		return str_replace('.', ' ', substr($data, 1));
	}

	/**
	 * Генерирует навигацию по доке
	 * @return string
	 */
	public function generateNavigate() {
		$lines = [];
		$h_stack = [0];   # stack of header-level numbers

		$indent = function() use ($h_stack) {
			return str_repeat('  ', count($h_stack) - 1);
		};

		foreach($this->navigate as $elem) {
			list($level, $id, $name) = $elem;
			end($lines);
			end($h_stack);
			if($level > current($h_stack)) {
				$lines[] = $indent() . "<ul>";
				$h_stack[] = $level;
			} elseif($level === current($h_stack)) {
				$e = array_pop($lines);
				$e .= "</li>";
				array_push($lines, $e);
			} else {
				while($level < current($h_stack)) {
					array_pop($h_stack);
					end($h_stack);
					if(!preg_match("/\<\/li\>/i", current($lines))) {
						$e = array_pop($lines);
						$e .= "</li>";
						array_push($lines, $e);
					}
					$lines[] = $indent() . "</ul></li>";
				}
			}

			$lines[] = $indent() . "<li><a href=\"#$id\"><span>$name</span></a>";
		}

		while(count($h_stack) > 1) {
			array_pop($h_stack);
			end($lines);
			if(!preg_match("/\<\/li\>/i", current($lines))) {
				$e = array_pop($lines);
				$e .= "</li>";
				array_push($lines, $e);
			}
			$lines[] = $indent() . "</ul>";
		}

		return implode("\n", $lines) . "\n";
	}

	/**
	 * Транслитерация русского языка
	 * @param  string $str
	 * @param  string $separator
	 * @return string
	 */
	public static function translit($str, $separator = '_') {
		$str = mb_strtolower($str);
		$str = str_replace(self::$fromLower, self::$toLower, $str);
		$str = trim(trim($str), $separator);

		return $str;
	}
}
