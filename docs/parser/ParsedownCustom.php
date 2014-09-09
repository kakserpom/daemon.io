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

    protected function identifyAtx($Line)
    {
        $regex = "/
            ^(\#{1,6})                      # 1 = string of #
            (\$|\&(?:[a-zA-Z0-9_\/-]+))?    # 2 = simple
            (
                [ \t]+
                ([a-zA-Z0-9_-]+)            # 4 = id
                [ \t]+
                \#
            )?
            [ \t]+
            (.+?)                           # 5 = Header text
            (
                [ \t]+
                \#>
                [ \t]+
                (.+?)                       # 7 Real Header text
            )?
            [ \t]*
            (?<!\\\\)                       # ensure not an escaped trailing #
            \#*                             # optional closing # (not counted)
            \n
            /xmu";

        $v = preg_match($regex, $Line['text'], $matches);

        if(!$v) {
            return;
        }

        // if($matches[4] === 'websocket') {
        //     var_dump($matches);
        //     die();
        // }

        $n = strlen($matches[1]);

        $isLink = $matches[2] and $matches[2][0] === '&';
        $isSimple = $matches[2] === '$';

        $html = isset($matches[7]) && $matches[7] ? $matches[7] : $matches[5];

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
            if(isset($matches[4]) && $matches[4]) {
                $header_id = $matches[4];
            } else {
                $header_id = $this->translit($matches[5], '-');
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
            $this->navigate[] = [$n, $header_path, $header_id];
        } elseif (!$isSimple) {
            $this->navigate[] = [$n, $header_path, $matches[5]];
        }

        $Block = array(
            'element' => array(
                'name' => 'h' . min(6, $n),
                'handler' => 'line'
            ),
        );

        if($isLink) {
            $start = strlen($matches[1]) + strlen($matches[2]) + 1;
            $Block['element']['text'] = sprintf(substr($matches[0], $start), $header_path);
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

    public static function translit($str, $separator = '_') {
        $str = mb_strtolower($str);
        $str = str_replace(self::$fromLower, self::$toLower, $str);
        $str = trim(trim($str), $separator);

        return $str;
    }

    private function parseAttributes($attributeString)
    {
        $Data = array();

        $attributes = preg_split('/[ ]+/', $attributeString, - 1, PREG_SPLIT_NO_EMPTY);

        foreach ($attributes as $attribute)
        {
            if ($attribute[0] === '#')
            {
                $Data['id'] = substr($attribute, 1);
            }
            else # "."
            {
                $classes []= substr($attribute, 1);
            }
        }

        if (isset($classes))
        {
            $Data['class'] = implode(' ', $classes);
        }

        return $Data;
    }

    private $attributesPattern = '{((?:[#.][-\w]+[ ]*)+)}';
}
