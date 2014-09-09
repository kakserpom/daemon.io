<?php

require 'Parsedown.php';
require 'ParsedownExtra.php';
require 'ParsedownCustom.php';

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

        // 4. Парсинг markdown
        $Parsedown = new ParsedownCustom();
        $this->markdown = $Parsedown->text($this->markdown);

        // 5. Постобработка
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
}