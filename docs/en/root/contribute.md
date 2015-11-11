## contribute # Contribute

If you want to help the project, then do not hesitate to start even if you have only a bit of time for it.
Any help is appreciated.

### this-doc # This documentation

We are struggling to minimize amount of undocumented parts, but we are running out of hands.
Even a paragraph written in 10 minutes is a big deal.


#### making-changes # Making changes

> Consider writing in the language you know best among all others.
> If you are bold enough to add new language, base it upon the most similar one of existing languages.

 1. Fork a repository [kakserpom/daemon.io](https://github.com/kakserpom/daemon.io)
 2. Change Markdown (.md) files in folder `./docs/&ltlanguage&gt/`
 3. Compile index.html by executing `./docs/build`
 4. Look how it looks in browser
 5. Send Pull Request

> Want to see changes in browser without running the command?
> Run `watch -n1 ./docs/build` — it shall be rebuilt every second 

#### markdown # Format of documentation
We use the [Markdown](http://ru.wikipedia.org/wiki/Markdown) with some extensions.

##### nesting # Nesting

For your convenience, documentation is split between many small files.
Including a file: `&lt;!-- import filepath.md --&gt;`.
Path is relative.

##### const # Constants

Constants are used for i18n and shortcuts for frequently used templates.
They may be defined as simple as that: `&lt;!-- pvar Name Value --&gt;`

Mandatory i18n contants `lang`, `title` and `menu-*` must be present in each translation of this documentation.

Constants may be used as templates. Calling a template: `{Name Value1 Value1...}`. Values will be places in result instead of `%s`.

Example of a template:  
`&lt;!-- pvar tpl-outlink &lt;a target="_blank" href="%s"&gt;%s&lt;i class="fa fa-external-link"&gt;&lt;/i&gt;&lt;/a&gt; --&gt;`

Example of its usage:  
`&#123;tpl-outlink http://en.wikipedia.org/wiki/Markdown Markdown&#125;`

##### headings # Headings
Headings may be defined like that:

 - `## anchor # Title`
 - `## якорь # Title #> Formatted heaing`

`anchor` - an identifier for navigation which takes place in URL. Allowed symbols are `[a-zA-Z0-9_-]`. Must be unique among anchors of its level to avoid URL collisions.

`Formatted heading` is used in case if heading in the page body should differ from heading in the navigation bar.

Examples:

 - Heading of first level `## contribute # Внести свою лепту`
 - Second level of heading: `### this-doc # This documentation`
 - Third level of heading: `#### markdown # Format of documentation`
 - Fourth level of heading: `#### headings # Headings`
 - Formatted heading: `### mysql # MySQL #> Clients \ MySQL`

> If you are adding new heading, make sure that anchor is written in English (strictly) and is simple and informative. Anchors are not supposed to be translated

##### lists # Lists

You can set CSS class of list element.

```
 -.n Element without list mark
 -.n.ti Element without list mark with indentation from the previous one
```

The following classes are currently in use:

 - `.n` - Элемент без символа списка
 - `.ti` - Indentation from the previous one
 - `.method` - special CSS-class for Methods

##### italic-and-bold # Italic and bold

Italic and bold works with `*`, `_` is not available due to the compatibility reasons.

##### single-line-code # Single line code

Wrapping of a code with apostrophes `&#96;...&#96;` дополнено возможностью применять модификаторы и CSS-классы.  
Модификаторы — это опции, включающие дополнительную обработку текста.
w
Модификаторы и классы пишутся после открывающего апострофа и должны быть закрыты дополнительным перед началом текста. Перед указанием модификаторов ставится символ `:` (двоеточие). Каждый модификатор указывается одним латинским символом. Классы указываются с помощью ведущей точки.

> При указании одновременно и модификаторов, и классов, сначала должны быть записаны модификаторы.

Список модификаторов:

 - `:e` - кодировать символы (по-умолчаниб кодирование символов выключено)
 - `:p` - парсинг ссылок
 - `:h` - php подсветка кода
 - `:c` - стилевое оформление без фона и обводки

Из классов на данный момент может применять только `&#46;clear`, но лучше указывайте модификатор `&#58;c`.

Примеры использования:

 - `&#96;:hc&#96;$url&#96;`
 - `&#96;:p&#96;max-requests (&#91;Number&#93;(#config/types/number) = '10k')&#96;`
 - `&#96;:ph.clear&#96;callback ( &#91;Connection&#93;(#clients/http/connection) $conn, boolean $success )&#96;`

##### multi_code # Многострочный код

Многострочный код добавлен возможностью подсветки синтаксиса и указанием CSS-классов.
Код, содержащий конфигурацию, обозначается синтаксисом `ruby`.

Из классов на данный момент может применять только `.inline` для оформления методов.

Примеры:

> &#96;&#96;&#96;php.inline  
> void public post ( url $url, array $data, array $params )  
> void public post ( url $url, array $data, callable $resultcb )  
> &#96;&#96;&#96;

> &#96;&#96;&#96;ruby  
> Pool:HTTPServer {  
> &nbsp;&nbsp;&nbsp;&nbsp;listen "tcp://0.0.0.0:80", "tcp://0.0.0.0:443##myContext";  
> &nbsp;&nbsp;&nbsp;&nbsp;port 80;  
> &nbsp;&nbsp;&nbsp;&nbsp;privileged;  
> &nbsp;&nbsp;&nbsp;&nbsp;maxconcurrency 1;  
> }  
> &#96;&#96;&#96;

### php-doc # PHPDoc

Аналогично, чтобы восполнить пробелы в PHPDoc-комментариях в коде, сделайте Fork [основного репозитория](https://github.com/kakserpom/phpdaemon), внесите изменения и пошлите Pull Request.

> Учтите, что все PHPDoc-комментарии пишутся строго на английском языке

### code # Программный код

Улучшения программного кода всегда приветствуется. Если у вас есть модуль для публикации, и вы считаете, что он заслуживает включения в основной репозиторий, пришлите Pull Request. Аналогично поступайте с улучшениями существующего кода.
