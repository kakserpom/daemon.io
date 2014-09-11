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

    /**
     * @var boolean Тип заголовка
     */
    protected $headers_mode_link = false;

    public static $fromLower = Array("э", "ч", "ш", "ё", "ё", "ж", "ю", "ю", "я", "я", "а", "б", "в", "г", "д", "е", "з", "и", "й", "к", "л", "м", "н", "о", "п", "р", "с", "т", "у", "ф", "х", "ц", "щ", "ъ", "ы", "ь");
    public static $toLower = Array("e", "ch", "sh", "yo", "jo", "zh", "yu", "ju", "ya", "ja", "a", "b", "v", "g", "d", "e", "z", "i", "j", "k", "l", "m", "n", "o", "p", "r", "s", "t", "u", "f", "h", "c", "w", "", "y", "");

    /**
     * Сложная обработка заголовков. Составление навигации
     * @param  array $Line
     * @return array
     */
    protected function identifyAtx($Line, $CurrentBlock)
    {
        // 1 = string of #
        // 2 = simple/link
        preg_match('/^(\#{1,6})(\$|\&(?:[a-zA-Z0-9_\/-]+))?\s+/', $Line['text'], $matches);

        $n = strlen($matches[1]);
        $isLink = isset($matches[2]) && $matches[2] && $matches[2][0] === '&';
        $isSimple = isset($matches[2]) && $matches[2] === '$';

        $match1len = isset($matches[1]) ? strlen($matches[1]) : 0;
        $match2len = isset($matches[2]) ? strlen($matches[2]) : 0;
        $text = substr($Line['text'], $match1len + $match2len + 1);
        $parts = preg_split('/\s+\#\>?\s+/', $text, 3, PREG_SPLIT_NO_EMPTY);

        if(empty($parts)) {
            return;
        }

        $html = isset($parts[2]) ? $parts[2] : (isset($parts[1]) ? $parts[1] : '');

        # автоопределение значения n для ссылок
        if($isLink) {
            $n = count($this->headers_stack) + 1;

            if(!$this->headers_mode_link) {
                ++$n;
            }

            $this->headers_mode_link = true;
        } else {
            $this->headers_mode_link = false;
        }

        if($isLink) {
            $header_id = substr($matches[2], 1);
        } else {
            if(isset($parts[0])) {
                $header_id = $parts[0];
            } else {
                $header_id = $this->translit($parts[1], '-');
            }
        }

        $this->headers_stack = array_slice($this->headers_stack, 0, $n-2);
        $this->headers_id_stack = array_slice($this->headers_id_stack, 0, $n-2);
        $this->headers_id_stack[] = $header_id;

        $header_path = implode('/', $this->headers_id_stack);
        $header_id_attr = ['id' => $header_path];

        $pref = $header_path;
        $i = 1;

        while(true) {
            if(!isset($this->header_path_stack[$header_path])) {
                break;
            }

            $header_path = $pref . ++$i;
        }

        $this->header_path_stack[$header_path] = $header_path;

        if($isLink) {
            $html = $header_id;
        }

        if(!$isSimple and count($this->headers_stack)) {
            $hlinks = [];
            $i = 0;

            foreach($this->headers_stack as $name) {
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

        $this->headers_stack[] = $html;

        if($isLink) {
            $this->navigate[] = [$n, $header_path, $html];
        } elseif (!$isSimple) {
            $this->navigate[] = [$n, $header_path, isset($parts[1]) ? $parts[1] : ''];
        }

        $Block = array(
            'element' => array(
                'name' => 'h' . min(6, $n),
                'handler' => 'line'
            ),
        );

        if($isLink) {
            // $start = strlen($matches[1]) + strlen($matches[2]) + 1;
            // $text = sprintf(substr($text, $start), $header_path);
            // $Block['element']['handler'] = 'lines';
            // $Block['element']['text'] = sprintf($text, $header_path); // (array)

            $line = sprintf($text, $header_path);
            $indent = 0;

            while (isset($line[$indent]) and $line[$indent] === ' ')
            {
                $indent ++;
            }

            $line = $indent > 0 ? substr($line, $indent) : $line;

            $Line['body'] = $text;
            $Line['indent'] = $indent;
            $Line['text'] = $line;

            // так нельзя, надо по-правильному
            $Block = $this->identifyList($Line);
            $Block['type'] = 'List';
            $Block['incomplete'] = true;
            return $Block;

            // array(
            //     'element' => array(
            //         'handler' => 'lines',
            //         'text' => (array) $line
            //     )
            // );

            return $Block;
        } else {
            $Block['element']['text'] = "<div class=\"in anchor\">$header_html</div>\n\n";
            $Block['element']['attributes'] = $header_id_attr;
        }
        // elseif($header_id_attr) {
        //     return "<h%d%s><div class=\"in anchor\">%s</div></h%d>\n\n" % (n, header_id_attr, self._run_span_gamut(header_html), n)
        // } else {
        //     return "<h%d%s>%s</h%d>\n\n" % (n, header_id_attr, self._run_span_gamut(header_html), n)
        // }

        return $Block;
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
                $header_path = $this->addChildHeader($id, $id);

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
                $header_path = $this->addChildHeader($id, $id);

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

    /**
     * Добавляет дочерний заголовок
     * @param  string $header_id
     * @param  string $name
     * @return string $header_path
     */
    protected function addChildHeader($header_id, $name) {
        $stack = array_merge($this->headers_id_stack, [$header_id]);
        $header_path = implode('/', $stack);
        $n = count($this->headers_stack) + 2;

        $this->navigate[] = [$n, $header_path, $name];

        return $header_path;
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
